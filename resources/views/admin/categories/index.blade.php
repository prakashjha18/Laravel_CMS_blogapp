@extends('layouts.app')

@section('content')


    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        category name
                    </th>
                    <th>
                        Editing
                    </th>
                    <th>
                        deleting
                    </th>        
                </thead> 
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>
                            {{ $category->name }}
                        </td>
                    </tr>
                    @endforeach        
            </table>
        </div>
    </div>        

@stop