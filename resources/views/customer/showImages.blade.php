@extends('userDetails.layout')

 
@section('content')

    <div class="row">

            <div class="col-lg-12 margin-tb">

                <div class="pull-left">

                    <h2>Uploads List</h2>
                    <table class="table table-bordered">
                    <tr>
                        <th>Client Mobile:
                        {{$images->mobile}}
                        </th>
                        <th>Last Visited Date:
                        {{$images->updated_at}}
                        </th>
                    </tr>  

                </div>
            </div>
    </div>
            
    <table class="table table-bordered">
        
        <tr>
            <td>
                <img src='{{ asset("images/$images->file_name") }}' height="200" width="200">

                <div>
                    
                    <button class="fs-download btn btn-info btns_width" style="width:200px;"> Download </button>
                
                </div>

                <div>
                    
                    <button class="fs-download btn btn-success btns_width" style="width:70px;"> Whtsp </button>
                    
                    <button class="fs-download btn btn-primary btns_width"style="width:70px;">FB</button>
                
                </div>

            </td>
            
            <td>
                 <img src='{{ asset("images/$images->file_name") }}' height="200" width="200">

                 <div>
                    
                    <button class="fs-download btn btn-info btns_width" style="width:200px;"> Download </button>
                
                </div>

                <div>
                    
                    <button class="fs-download btn btn-success btns_width" style="width:70px;"> Whtsp </button>
                    
                    <button class="fs-download btn btn-primary btns_width"style="width:70px;">FB</button>
                
                </div>

            </td>
        </tr>

</table>
    @endsection
 