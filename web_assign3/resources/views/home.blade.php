@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    
                </div>

                <form action="/home" method="POST" class="form-horizontal"> 
                 {{ csrf_field() }}
                    <div class="form-group">
                        <label for="phpcode" class="col-sm-3 control-label">Enter Code</label>

                        <div class="col-sm-6">
                            <textarea name="code" id="php-code" class="form-control">{{$test}}</textarea>
                        </div>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-check"></i> Test
                            </button>
                        </div>
                    </div>

                

                <div class="form-group">
                        <label for="phpcode" class="col-sm-3 control-label">Result</label>

                        <div class="col-sm-6">
                            <textarea class="form-control">
                            <?php 
                            $result = preg_replace('/^<\?php(.*)(\?>)?$/s', '$1', $test);
                            if((preg_match('#sql#i', $result) === 1)|(preg_match('#delete#i', $result)===1)|(preg_match('#query#i',$result)===1)){
                                echo ("Error.\nSQL, DELETE & QUERY are reserved keywords. You can't use them.");
                            }
                            else
                               echo eval($result); 


                            ?></textarea>
                        </div>
                </div>
                </form>
          
            </div>
        </div>
    </div>
</div>
@endsection
