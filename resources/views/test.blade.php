<div>
    <div class="p-2 space-y-2 bg-white border border-gray-300 shadow rounded-xl dark:border-gray-600 dark:bg-gray-800">
        <div class="space-y-2">

            <div class="flex justify-between px-4 py-2">
                <div class="justify-between filament-stats-overview-widget">
                    <h1 class="text-sm"> Média da Pesquisa 22 </h1>

                </div>

                <div wire:ignore>
                    <input id="myDatePicker" x-data x-ref="input" type="text" data-input class='block p-2 mt-2 bg-white border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-800 w-52 dark:text-white disabled:bg-gray-200 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5' placeholder="Filtrar por data" />
                </div>
            </div>
        </div>
    </div>

    
    @once
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr" onload="alert('Script loaded!')"></script>
    @endonce

    <script type="text/javascript">
        window.onload = function(){
        $("#myDatePicker").flatpickr({
            mode: "range",
            dateFormat: "Y-m-d",
            defaultDate: ["2022-01-01", Date.now()],
            onValueUpdate: function(dObj, dStr, fp, dayElem) {
                if (dObj[0] && !dObj[1]) {

                    localStorage.setItem('date_start', new Date(Date.parse(dObj[0])).toLocaleDateString(
                        "fr-CA", {
                            year: "numeric",
                            month: "2-digit",
                            day: "2-digit"
                        }));

                    var retrievedStart = localStorage.getItem('date_start');
                    this.dateStart = retrievedStart;

                }

                if (dObj[1]) {
                    localStorage.setItem('date_end', new Date(Date.parse(dObj[1])).toLocaleDateString(
                        "fr-CA", {
                            year: "numeric",
                            month: "2-digit",
                            day: "2-digit"
                        }));

                    var retrievedDateEnd = localStorage.getItem('date_end');
                    this.dateEnd = retrievedDateEnd;


                }
            }
        })
        };
    </script>
    <div>