@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                
                     @if(count($codes) == 0)
                        
                            <div class="panel-body">
                               No Php codes are tested yet!
                            </div>
                    
                    @elseif(count($codes) > 0)
                        
                            <div class="panel-body">
                                <table class="table table-striped task-table">

                                    <!-- Table Headings -->
                                    <thead>
                                        <th>Code</th>
                                        <th>Created By</th>
                                    </thead>

                                    <!-- Table Body -->
                                    <tbody>
                                        @foreach ($codes as $code)
                                            <tr>

                                                <td width='75%'>
                                                    <div>{{ $code->code }}</div>
                                                </td>
                                                
                                                <td class="table-text">
                                                    <div>{{ $code->email }}</div>
                                                </td>

                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    @endif
                </div>
        </div>
    </div>
</div>
@endsection
