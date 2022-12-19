<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Valor das Commodities

                        <div class="table-responsive" style="margin-top:10px;">
                        <table class="table table-striped">
                        <thead style="background:#f3f2f7;">
                            <tr>
                                <th style="width:30px;"></th>
                                <th style="width:40px;">Id</th>
                                <th>Commodities</th>
                                <th>Preço </th>
                                <th>Data e Hora</th>
                                <th>Métrica</th>
                                <th>API</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                                <td><input type="checkbox"></td>
                                <td>1</td>
                                <td>Petroleo</td>
                                <td>R$119.73</td>
                                <td>{{ date('d/m/Y') }} </td>
                                <td>Barril </td>
                                <td><a target="_blank" href="./api?tipo=petroleo&token={{ $_COOKIE['token'] }}"><img src="https://cdn-icons-png.flaticon.com/512/2165/2165004.png" width="30"></a></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>2</td>
                                <td>Ouro</td>
                                <td>R$1819.60</td>
                                <td>{{ date('d/m/Y') }} </td>
                                <td>Onça </td>
                                <td><a target="_blank" href="./api?tipo=ouro&token={{ $_COOKIE['token'] }}"><img src="https://cdn-icons-png.flaticon.com/512/2165/2165004.png" width="30"></a></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>3</td>
                                <td>Arroz</td>
                                <td>R$72.22</td>
                                <td>{{ date('d/m/Y') }} </td>
                                <td>Saca </td>
                                <td><a target="_blank" href="./api?tipo=arroz&token={{ $_COOKIE['token'] }}"><img src="https://cdn-icons-png.flaticon.com/512/2165/2165004.png" width="30"></a></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>4</td>
                                <td>Café</td>
                                <td>R$1322.74</td>
                                <td>{{ date('d/m/Y') }} </td>
                                <td>Saca </td>
                                <td><a target="_blank" href="./api?tipo=cafe&token={{ $_COOKIE['token'] }}"><img src="https://cdn-icons-png.flaticon.com/512/2165/2165004.png" width="30"></a></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>5</td>
                                <td>Etanol</td>
                                <td>R$72.22</td>
                                <td>{{ date('d/m/Y') }} </td>
                                <td>Litro </td>
                                <td><a target="_blank" href="./api?tipo=etanol&token={{ $_COOKIE['token'] }}"><img src="https://cdn-icons-png.flaticon.com/512/2165/2165004.png" width="30"></a></td>
                            </tr>
                        </tbody>
                        </table>
                        </div>


                </div>







            </div>
        </div>
    </div>
</x-app-layout>
