@extends('layouts.app')

@section('content')


    <div class="panel panel-default">
            <div class="panel-heading">
                    users
            </div> 
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        Image
                    </th>
                    <th>
                        name
                    </th>
                    <th>
                        permissions
                    </th>    
                    <th>
                        delete
                    </th>    
                </thead> 
                <tbody>
                    @if($users->count()>0)
                    @foreach($users as $user)
                       <tr>
                           <td>
                                <img src="{{asset($user->profile->avatar)}}" alt=""  width="60px" height="60px"  style="border-radius: 50%;">        
                           </td>
                           <td>
                               {{$user->name}}
                           </td>
                           <td>
                               permissions
                           </td>
                           <td>
                               delete
                           </td>
                       </tr>
                    @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">no users</th>
                        </tr>  
                    @endif
                </tbody>

            </table>
        </div>
    </div>        

@stop