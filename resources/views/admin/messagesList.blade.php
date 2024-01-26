@extends('layouts.admin')
@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Messages</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="container">
              <h2>Messages List</h2>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Show Message</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($contact as $a)
                  <tr>
                    <td>{{ $a->name }}</td>
                    <td>{{ $a->email }}</td>   
                    <td><a href="showMessage/{{ $a->id }}">ShowMessage</a></td>
                  </tr>
                  @endforeach
                </tbody>    
              </table>
            </div>

          </div>
        </div>
        <!-- /page content -->
        @endsection

  </body>
</html>