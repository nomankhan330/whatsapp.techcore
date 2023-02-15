<table class="table table-row-bordered" id="variableTable">
    <thead>
        <tr class="fw-bold fs-6 text-muted">
            <th width="70%">Parameter Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="fw-bold">

        @for ($i = 1; $i < 25; $i++)
            @php
                $a = '{{'; $b='}}';
            @endphp
            <tr>
                <td hidden>{{ $a . $i . $b }}</td>
                <td>{{ $i }}</td>
                <td><button type="button" class="btn btn-success btn-sm btnAdd" onclick="copyToChipBoard(this)">Add
                        Variables</button></td>
            </tr>
        @endfor


    </tbody>
</table>
<script>
    function copyToChipBoard(obj) {
        variable = obj.parentElement.previousElementSibling.previousElementSibling.textContent;
        body = $("#body_text").val();
        typeInTextarea(variable, $("#body_text"))
        textBodyTemplate();
        // body += variable;
        // $("#body_text").val(body);
        $('#myModalMd').modal('hide');

    }

    function typeInTextarea(newText, el) {
        const start = el[0].selectionStart
        const end = el[0].selectionEnd
        const text = el[0].value
        const before = text.substring(0, start)
        const after = text.substring(end, text.length)
        el[0].value = (before + newText + after)
        el[0].selectionStart = el.selectionEnd = start + newText.length
    }
</script>
