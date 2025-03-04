@extends('./layouts/app')
@section('page-content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Bienvenue {{$user->name}}</h3>
              <h6 class="font-weight-normal mb-0">Vous avez <span class="text-primary">3 notifications non lu</span></h6>
            </div>
            <div class="col-12 col-xl-4">
             <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  Today ({{date('d-M-Y')}})
                </button>
               
              </div>
             </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card tale-bg">
            <div class="card-people mt-auto">
             <img src="./img/1.jpg" alt="">
            </div>
          </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
          <div class="row">
            <div class="col-md-12 mb-4 stretch-card transparent">
              <div class="card card-tale">
                <div class="card-body">
                  <p class="mb-4">ToTal des demandes</p>
                  <p class="fs-30 mb-2">06</p>
                  <p>Depuis le 06/2025</p>
                </div>
              </div>
            </div>
            
          </div>
          
        </div>
      </div>
     
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Listes des demandes soumises</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>Nom Complet</th>
                                    <th>Service</th>
                                    <th>Date de Dépôt</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($demandes as $demande)
                                    <tr>
                                        <td>{{ $demande->nom_complet }}</td>
                                        <td>{{ $demande->service }}</td>
                                        <td>{{ \Carbon\Carbon::parse($demande->date_depot)->format('d M Y') }}</td>
                                        <td>
                                            <div class="badge badge-{{ $demande->status == 'en attente' ? 'warning' : 'success' }}">
                                                {{ ucfirst($demande->status) }}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Aucune demande trouvée</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
      <div class="row">
        
        
        
      </div>
      {{-- <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Advanced Table</p>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="example" class="display expandable-table" style="width:100%">
                      <thead>
                        <tr>
                          <th>Quote#</th>
                          <th>Product</th>
                          <th>Business type</th>
                          <th>Policy holder</th>
                          <th>Premium</th>
                          <th>Status</th>
                          <th>Updated at</th>
                          <th></th>
                        </tr>
                      </thead>
                  </table>
                  </div>
                </div>
              </div>
              </div>
            </div>

            
          </div>
        </div> --}}
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © {{date('Y')}} powered by Honorat SAGBO & Oscar Migan </span>
      </div>
      
    </footer> 
    <!-- partial -->
  </div>
@endsection