@extends('layout.main')

@section('content')
    <div class="container my-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Compagnia</th>
                    <th scope="col">Stazione di Partenza</th>
                    <th scope="col">Stazione di Arrivo</th>
                    <th scope="col">Orario di Partenza</th>
                    <th scope="col">Orario di Arrivo</th>
                    <th scope="col">Codice Treno</th>
                    <th scope="col">Numero Carrozze</th>
                    <th scope="col">In Orario</th>
                    <th scope="col">Cancellato</th>
                    <th scope="col">In Ritardo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trains as $train)
                    <tr>
                        <td>{{ $train->id }}</td>
                        <td>{{ $train->company }}</td>
                        <td>{{ $train->departure_station }}</td>
                        <td>{{ $train->arrival_station }}</td>
                        <td>{{ $train->departure_time }}</td>
                        <td>{{ $train->arrival_time }}</td>
                        <td>{{ $train->train_code }}</td>
                        <td>{{ $train->carriage_number }}</td>
                        <td>{{ $train->in_time ? 'Si' : 'No' }}</td>
                        <td>{{ $train->deleted ? 'Si' : 'No' }}</td>
                        <td>{{ $train->delayed ? 'Si' : 'No' }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="container">
            {{ $trains->links() }}
        </div>
    </div>
@endsection
