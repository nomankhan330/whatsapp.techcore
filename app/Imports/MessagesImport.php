<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\MessageBulkDetail;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Auth;

HeadingRowFormatter::default('none');

class MessagesImport implements ToModel, WithHeadingRow, WithValidation
{
    protected $template;
    protected $bulkId;
    protected $broadcastName;

    public function __construct($template, $bulkId, $broadcastName)
    {
        $this->template = $template;
        $this->bulkId = $bulkId;
        $this->broadcastName = $broadcastName;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $userId = Auth::user()->id;
        $body = $this->template[0]->body_text;
        // preg_match_all('/{{(.*?)}}/', $body, $matches);
        // $params = $matches[0];
        // $params = array_values(array_unique($params));
        // for ($i=0; $i < count($params) ; $i++) {
        //     if(is_null($row[$params[$i]]))
        //     {
        //     }
        // }
        // dd($row['{{1}}']);
        foreach ($row as $key => $value) {
            $body = str_replace($key, $value, $body);
        }
        $headerType = $this->template[0]->header_type;
        $buttonType = $this->template[0]->button_type;
        $dataArr = array();
        $dataArr['messaging_product'] = "whatsapp";
        $dataArr['to'] = $row['Whats App Number With Country Code'];
        $dataArr['type'] = "template";
        $templateArr = array();
        $templateArr['name'] = $this->template[0]->templateCategory->fullname; // fullname // category
        $langArr = array();
        $langArr['code'] = $this->template[0]->templateLanguage->shortname;
        $langArr['policy'] = 'deterministic';
        $templateArr['language'] = $langArr;
        $componentsArr = array();
        if ($headerType == 'media') {
            $componentsArrs = array();
            $componentsArrs['type'] = 'header';
            $parametersArr = array();
            $parametersArr['type'] = 'image';
            $parametersArr['image'] = array("link" => "http(s)://the-image-url");
            $new = array();
            array_push($new, $parametersArr);
            $componentsArrs['parameters'] = $new;
            array_push($componentsArr, $componentsArrs);
        }
        $componentsArrs = array();
        $componentsArrs['type'] = 'body';
        $parametersArr = array();
        $parametersArr['type'] = 'text';
        $parametersArr['text'] = $body;
        $new = array();
        array_push($new, $parametersArr);
        $componentsArrs['parameters'] = $new;
        array_push($componentsArr, $componentsArrs);
        if ($buttonType == 'quick_reply') {
            $ii = 0;
            foreach ($this->template[0]->button_value as $key => $value) {
                $componentsArrs = array();
                $componentsArrs['type'] = 'button';
                $componentsArrs['sub_type'] = 'quick_reply';
                $componentsArrs['index'] = $ii;
                $parametersArr = array();
                $parametersArr['type'] = 'text';
                $parametersArr['text'] = $value;
                $new = array();
                array_push($new, $parametersArr);
                $componentsArrs['parameters'] = $new;
                array_push($componentsArr, $componentsArrs);
                $ii++;
            }
        }
        $templateArr['components'] = $componentsArr;
        $dataArr['template'] = $templateArr;
        $dataArr = json_encode($dataArr);
        return new MessageBulkDetail([
            'bulk_id' => $this->bulkId,
            'user_id' => $userId,
            "template_id" => $this->template[0]->id,
            "template_name" => $this->template[0]->template_name,
            "broadcast_name" => $this->broadcastName,
            'contact_number' => $row['Whats App Number With Country Code'],
            'message_type' => 'Template',
            'message' => $dataArr,
        ]);
    }

    public function rules(): array
    {
        $body = $this->template[0]->body_text;
        preg_match_all('/{{(.*?)}}/', $body, $matches);
        $params = $matches[0];
        $params = array_values(array_unique($params));
        $arr = array();
        foreach ($params as $key => $value) {
            $arr[$value] = ['required'];
        }
        return $arr;
    }

}
