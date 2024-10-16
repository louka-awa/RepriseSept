@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pages CMS</h4>
                        <!-- <p class="card-description">
                            Ajouter la classe <code>.table-bordered</code>
                        </p> -->
                        <a style="max-width: 150px; float: right; display: inline-block;" href="{{ url('admin/add-edit-cms-page') }}" class="btn btn-block btn-primary">Ajouter une page CMS</a>
                        @if(Session::has('success_message'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Succès : </strong> {{ Session::get('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif
                        <div class="table-responsive pt-3">
                            <table id="pages" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Titre
                                        </th>
                                        <th>
                                            URL
                                        </th>
                                        <th>
                                            Statut
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($cms_pages as $page)
                                    <tr>
                                        <td>
                                            {{ $page['id'] }}
                                        </td>
                                        <td>
                                            {{ $page['title'] }}
                                        </td>
                                        <td>
                                            {{ $page['url'] }}
                                        </td>
                                        <td>
                                            @if($page['status'] == 1)
                                              <a class="updatePageStatus" id="page-{{ $page['id'] }}" page_id="{{ $page['id'] }}" href="javascript:void(0)"><i style="font-size:25px;" class="mdi mdi-bookmark-check" status="Actif"></i></a>
                                            @else
                                              <a class="updatePageStatus" id="page-{{ $page['id'] }}" page_id="{{ $page['id'] }}" href="javascript:void(0)"><i style="font-size:25px;" class="mdi mdi-bookmark-outline" status="Inactif"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-cms-page/'.$page['id']) }}"><i style="font-size:25px;" class="mdi mdi-pencil-box"></i></a>
                                            <?php /* <a title="Page" class="confirmDelete" href="{{ url('admin/delete-page/'.$page['id']) }}"><i style="font-size:25px;" class="mdi mdi-file-excel-box"></i></a> */ ?>
                                            <a href="javascript:void(0)" class="confirmDelete" module="page" moduleid="{{ $page['id'] }}"><i style="font-size:25px;" class="mdi mdi-file-excel-box"></i></a>
                                        </td>
                                    </tr>
                                   @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- la fin de content-wrapper -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Droit d'auteur © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">template admin Bootstrap</a> de BootstrapDash. Tous droits réservés.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Fait à la main & créé avec <i class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer>
    <!-- partial -->
</div>
@endsection
