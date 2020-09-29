function selectFigure(value) {

    switch (value) {
        case 'circle':
            $('#circleForm').show();
            $('#threeDotsBlock').hide();
            break;
        case 'parallelogram':
            $('#circleForm').hide();
            $('#threeDotsType').val('parallelogramAdd');
            $('#threeDotsBlock').show();
            break;
        case 'triangle':
            $('#circleForm').hide();
            $('#threeDotsType').val('triangleAdd');
            $('#threeDotsBlock').show();
            break;
            composer

    }
}

function getFigureList() {
    $.ajax({
        url: "http://localhost:8080/app/index.php",
        method: 'get',
        data: {action: 'getFigureList'},
        success: function (result) {
            const resultPars = JSON.parse(result);
            resultPars.forEach(
                function (item){
                    let child = '<tr><td>'+ item.id+ '</td><td>'+item.type+'</td><td>'+item.area+'</td></tr>';
                    $('#listTable').append(child);
                }
            )

        }
    })
}

function insertFigureListIntoPage() {

}

function showPage(value) {
    switch (value) {
        case 'add':
            $('#formPage').show();
            $('#listPage').hide();
            break;
        case 'list':
            const figureListData = getFigureList();
            insertFigureListIntoPage();
            $('#formPage').hide();
            $('#listPage').show();
            break;
    }
}

function submitForm(form) {
    let data = $(form).serialize();
    $.ajax({
        url: "http://localhost:8080/app/index.php",
        method: 'post',
        data: data,
        success: function (result) {
            const decodeResult = JSON.parse(result);

            if (decodeResult.figureId !== undefined) {
                $('#resultMessage').text("Фигура успешно сохранена. ID фигуры " + decodeResult.figureId);
            }
        }
    })

}
