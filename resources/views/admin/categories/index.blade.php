@extends('layouts.app')

@section('content')


    <div class="panel panel-default">
        <div class="panel-heading">
            Categories
        </div>    
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
                    @if($categories->count() > 0)
                    @foreach($categories as $category)
                    <tr>
                        <td>
                            {{ $category->name }}
                        </td>
                        <td>
                            <a href="{{ route('category.edit', ['id'=> $category->id]) }}" class="btn btn-xs btn-info">
                               edit
                            </a>
                        </td> 
                        <td>
                                <a href="{{ route('category.delete', ['id'=> $category->id]) }}" class="btn btn-xs btn-danger">
                                   delete
                                </a>
                            </td>   
                    </tr>
                    @endforeach 
                    @else
                    <tr>
                            <th colspan="5" class="text-center">no categories yet</th>
                        </tr>  
                    @endif
                </tbody>       
            </table>
        </div>
    </div>        

@stop