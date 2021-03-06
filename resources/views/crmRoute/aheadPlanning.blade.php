{{--/*--}}
{{--*@category: CRM,--}}
{{--*@info: This view allows user to edit given hotel (DB table: "hotels"),--}}
{{--*@controller: CrmRouteController,--}}
{{--*@methods: hotelGet, hotelPost--}}
{{--*/--}}

@extends('layouts.main')
@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link href="{{ asset('/css/fixedColumns.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/fixedHeader.dataTables.min.css')}}" rel="stylesheet">


@endsection
@section('content')

    <style>

        #datatable td {
            -moz-user-select: none; /* Firefox */
            -ms-user-select: none; /* Internet Explorer */
            -webkit-user-select: none; /* Chrome, Safari, and Opera */
            -webkit-touch-callout: none; /* Disable Android and iOS callouts*/
        }

        #float {
            position: fixed;
            top: 3em;
            right: 2em;
            z-index: 100;
        }

        .heading-container {
            text-align: center;
            font-size: 2em;
            margin: 1em;
            font-weight: bold;
            box-shadow: 0 1px 15px 1px rgba(39, 39, 39, .1);
            padding-top: 1em;
            padding-bottom: 1em;
        }

        .form-container {
            box-shadow: 0 1px 15px 1px rgba(39, 39, 39, .1);
            padding-top: 1em;
            padding-bottom: 1em;
            margin: 1em;
        }

        .colorCell {
            background-color: #bcb7ff !important;
        }

        .selectedCell {
            border-color: blue !important;
            border-style: dashed !important;
        }
    </style>

    {{--Header page --}}
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <div class="alert gray-nav ">Planowanie Wyprzedzenia</div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date" class="myLabel">Data początkowa:</label>
                                <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="datak" style="width:100%;">
                                    <input class="form-control" name="date_start" id="date_start" type="text" value="{{date("Y-m-d")}}">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_stop" class="myLabel">Data końcowa:</label>
                                <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="datak" style="width:100%;">
                                    <input class="form-control" name="date_stop" id="date_stop" type="text" value="{{date("Y-m-d")}}">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 buttonSection">

                        </div>
                    </div>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Tydzien</th>
                            <th>Dzień</th>
                            <th>Data</th>
                            @foreach($departmentInfo as $item)
                                <th>{{$item->name2.' '.$item->name}}</th>
                            @endforeach
                            <th>Suma</th>
                            <th>Podział</th>
                            {{--@foreach($departmentInfo as $item)--}}
                            {{--<th>CEL {{$item->name2.' '.$item->name}}</th>--}}
                            {{--@endforeach--}}
                        </tr>
                        </thead>
                        <tbody>
                        {{--@foreach($departmentInfo as $item)--}}
                        {{--<tr>--}}
                        {{--<td>1</td>--}}
                        {{--<td>2</td>--}}
                        {{--<td>3</td>--}}
                        {{--@foreach($departmentInfo as $item)--}}
                        {{--<td>1123123123123123</td>--}}
                        {{--@endforeach--}}
                        {{--<td>5</td>--}}
                        {{--<td>6</td>--}}
                        {{--@foreach($departmentInfo as $item)--}}
                        {{--<td>1123123123123123</td>--}}
                        {{--@endforeach--}}
                        {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--@foreach($departmentInfo as $item)--}}
                        {{--<tr>--}}
                        {{--<td>1</td>--}}
                        {{--<td>2</td>--}}
                        {{--<td>3</td>--}}
                        {{--@foreach($departmentInfo as $item)--}}
                        {{--<td>1123123123123123</td>--}}
                        {{--@endforeach--}}
                        {{--<td>5</td>--}}
                        {{--<td>6</td>--}}
                        {{--@foreach($departmentInfo as $item)--}}
                        {{--<td>1123123123123123</td>--}}
                        {{--@endforeach--}}
                        {{--</tr>--}}
                        {{--@endforeach--}}
                        </tbody>
                    </table>
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ asset('/js/fixedColumns.dataTables.min.js')}}"></script>
    <script src="{{ asset('/js/dataTables.fixedHeader.min.js')}}"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function (mainEvent) {

            (function activateDatepicker() {
                $('.form_date').datetimepicker({
                    language:  'pl',
                    autoclose: 1,
                    minView : 2,
                    pickTime: false,
                });
            })();


            /********** GLOBAL VARIABLES ***********/
            let elementsToSum = {
                firstElement: {trId: null, tdId: null},
                lastElement: {trId: null, tdId: null}
            };
            let sumOfSelectedCells = 0;
            const now = new Date();
            const day = ("0" + now.getDate()).slice(-2);
            const month = ("0" + (now.getMonth() + 1)).slice(-2);
            const today = now.getFullYear() + "-" + (month) + "-" + (day);
            const firstDayOfThisMonth = now.getFullYear() + "-" + (month) + "-01";
            /*******END OF GLOBAL VARIABLES*********/

            $('#date_start').val(firstDayOfThisMonth);

            /*********************DataTable FUNCTUONS****************************/

            table = $('#datatable').DataTable({
                serverSide: true,
                scrollY: '60vh',
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                fixedColumns:{
                    leftColumns: 3
                },
                "ajax": {
                    'url': "{{ route('api.getaHeadPlanningInfo') }}",
                    'type': 'POST',
                    'data': function (d) {
                        d.startDate = $('#date_start').val();
                        d.stopDate = $("#date_stop").val();
                    },
                    'headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                },
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Polish.json"
                }, fnDrawCallback: function () {
                    elementsToSum.firstElement.tdId = null;
                    elementsToSum.firstElement.trId = null;
                    elementsToSum.lastElement.tdId = null;
                    elementsToSum.lastElement.trId = null;
                }, "columns": [
                    {"data": "numberOfWeek"},
                    {"data": "dayName"},
                    {"data": "day"},
                    @foreach($departmentInfo as $item)
                    {"data": `{{$item->name2}}`},
                    @endforeach
                    {"data": "totalScore"},
                    {
                        "data": function (d) {
                            if (d.allSet == false) {
                                return "Nie";
                            }
                            else {
                                return "Tak";
                            }
                        }
                    }
                ]
            });


            /*********************EVENT LISTENERS FUNCTIONS****************************/


            $('#date_start, #date_stop').on('change',function(e) {
               table.ajax.reload();
            });

            /**
             * This event listener finds row and column of clicked 'td' element and colors selected cells
             */
            $('#datatable').click((e) => {
                addOrRemoveClickedElement(e);

                if (elementsToSum.firstElement.tdId !== null
                    && (elementsToSum.firstElement.trId !== elementsToSum.lastElement.trId
                        || elementsToSum.firstElement.tdId !== elementsToSum.lastElement.tdId)) {
                    $('#sumButton').removeAttr('disabled');
                } else if (!$('#sumButton').prop('disabled'))
                    $('#sumButton').prop('disabled', true);
            });

            /*********************END EVENT LISTENERS FUNCTIONS****************************/

            /**
             * This function saves clicked cell positions (tr and td id's).
             * First cell is saved after click, second is saved after click + shift (if first is saved)
             */
            function addOrRemoveClickedElement(e) {
                let clickedElement = $(e.target);
                let trElement = clickedElement.parent();
                let tableElement = trElement.parent();
                let clickedElementTdIndex = trElement.children().index(clickedElement);
                let clickedElementTrIndex = tableElement.children().index(trElement);
                if (clickedElement.is('td') && clickedElementTdIndex >= 3)
                    if (e.shiftKey) {
                        if (elementsToSum.firstElement.tdId !== null) {
                            elementsToSum.lastElement.tdId = elementsToSum.lastElement.tdId; //clickedElementTdIndex;
                            elementsToSum.lastElement.trId = clickedElementTrIndex;
                            colorCells(elementsToSum);
                            $.notify({
                                title: $($('#datatable tr').first().children().get(elementsToSum.firstElement.tdId)).text()+': ' ,
                                message: '<strong>'+sumOfSelectedCells+'</strong>'
                            },{
                                type: 'info',
                                placement: {
                                    from: "bottom",
                                    align: "right"
                                },
                            });
                        }
                    } else {
                        $('.selectedCell').removeClass('selectedCell');
                        clickedElement.addClass('selectedCell');
                        elementsToSum.firstElement.tdId = clickedElementTdIndex;
                        elementsToSum.firstElement.trId = clickedElementTrIndex;
                        elementsToSum.lastElement.tdId = clickedElementTdIndex;
                        elementsToSum.lastElement.trId = clickedElementTrIndex;
                        if (clickedElement.is('.colorCell')) {
                            $('.selectedCell').removeClass('selectedCell');
                            $('.colorCell').removeClass('colorCell');
                            elementsToSum.firstElement.tdId = null;
                            elementsToSum.firstElement.trId = null;
                            elementsToSum.lastElement.tdId = null;
                            elementsToSum.lastElement.trId = null;
                        } else
                            colorCells(elementsToSum);
                    }
            }

            /**
             * This function add class 'colorCell' to cells in array of cells appointed by two corner cells.
             * Elements is a object that has positions of first and last cell (tr and td id's)
             */
            function colorCells(elements) {
                $('.colorCell').removeClass('colorCell');
                trElements = $('#datatable tr');

                //selecting left top and right bottom cells
                firstElementTrId = elements.firstElement.trId;
                firstElementTdId = elements.firstElement.tdId;
                lastElementTrId = elements.lastElement.trId;
                lastElementTdId = elements.lastElement.tdId;

                //if selected cells are not left top and right bottom cells, switch values properly
                //firstElement - left top corner, lastElement - right bottom corner
                if (firstElementTrId > lastElementTrId) {               //if first element is below last element
                    firstElementTrId = elementsToSum.lastElement.trId;
                    lastElementTrId = elementsToSum.firstElement.trId;
                    if (firstElementTdId > lastElementTdId) {           //if first element is on right side of last element
                        firstElementTdId = elementsToSum.lastElement.tdId;
                        lastElementTdId = elementsToSum.firstElement.tdId;
                    }
                } else if (firstElementTdId > lastElementTdId) {               //if first element is on right side of last element
                    firstElementTdId = elementsToSum.lastElement.tdId;
                    lastElementTdId = elementsToSum.firstElement.tdId;
                }

                sumOfSelectedCells = 0;
                //add class colorCell to all cell beetween first and last element
                for (var i = firstElementTrId; i <= lastElementTrId; i++) {
                    tdElements = $(trElements.get(i + 1)).children();
                    for (var j = firstElementTdId; j <= lastElementTdId; j++) {
                        $(tdElements.get(j)).addClass('colorCell');
                        sumOfSelectedCells += parseInt($(tdElements.get(j)).text());
                    }
                }

                //rightTopCell = $($(trElements.get(firstElementTrId + 1)).children().get(lastElementTdId));

            }
        });
    </script>
@endsection
