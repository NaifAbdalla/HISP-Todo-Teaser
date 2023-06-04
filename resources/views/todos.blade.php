@extends('layouts.app')
@section('content')

    <div class="row mt-4 mx-4 justify-content-center mt-5">
        <div class="col-md-8 ">
            <div class="card bg mb-4 shadow border-0">
                <div class="card-header pb-0 border-bottom-0 bg-transparent text-center">
                    <h1 class="d-inline-block">TODO LIST</h1>
                    <x-add-button :id="$id"/>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <x-table>
                        <x-slot:header>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-4">
                                    Title
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Create Date
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Status
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action
                                </th>
                            </tr>
                        </x-slot:header>

                        @foreach($data as $entry)
                            @php
                                $value = $entry['value'];
                            @endphp

                            <tr>
                                <td>
                                    <div class="d-flex px-3 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h5 class="mb-0 text-sm">{{ $value['title'] }}</h5>
                                        </div>
                                    </div>
                                </td>

                                <td class="align-middle text-center text-sm">
                                    <p class="text-sm font-weight-bold mb-0">
                                        <time>{{  date('d/m/Y', strtotime($value['created'])) }}</time>
                                    </p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                <span
                                    class="badge px-3 py-2 rounded-pill {{ $value['completed']?'bg-success':'bg-warning' }}">{{ $value['completed']? 'Completed':'Pending' }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex px-3 py-1 justify-content-center">
                                        <x-edit-button :value="$value"/>
                                        <x-delete-button :id="$value['id']"/>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>

@endsection
