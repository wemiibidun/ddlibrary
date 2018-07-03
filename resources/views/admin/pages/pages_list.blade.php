@extends('admin.layout')
@section('admin.content')
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Pages</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> All Pages</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>NO</th>
                <th>TITLE</th>
                <th>LANGUAGE</th>
                <th>CREATED</th>
                <th>UPDATED</th>
                <th>OPERATIONS</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>NO</th>
                <th>TITLE</th>
                <th>LANGUAGE</th>
                <th>CREATED</th>
                <th>UPDATED</th>
                <th>OPERATIONS</th>
              </tr>
            </tfoot>
            <tbody>
            @foreach ($pages as $indexkey => $page)
              <tr>
                <td>{{ (($pages->currentPage() - 1) * 20)+$indexkey + 1 }}</td>
                <td><a href="{{ URL::to('pages/view/'.$page->pageid) }}">{{ $page->title }}</a></td>
                <td>{{ $page->language }}</td>
                <td>{{ Carbon\Carbon::createFromTimestamp($page->created)->diffForHumans() }}</td>
                <td>{{ Carbon\Carbon::createFromTimestamp($page->updated)->diffForHumans() }}</td>
                <td><a href="pages/edit/{{$page->pageid}}">Edit</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $pages->links() }}
      </div>
    </div>
  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->
  @endsection