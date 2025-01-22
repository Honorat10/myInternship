@extends('./layouts/app')
@section('page-content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <div class="card-body">
                        <h4 class="card-title">myInternShip / Nouvelle demande</h4>
                        <form class="forms-sample" method="POST" action="/new" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nom complet</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="nom_complet"
                                    placeholder="Nom complet" value="{{ old('nom_complet') }}" required>
                                @error('nom_complet')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                    placeholder="Email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputService">Service</label>
                                <input type="text" class="form-control" id="exampleInputService" name="service"
                                    placeholder="Service" value="{{ old('service') }}" required>
                                @error('service')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="typeStage">Type de stage</label>
                                <select name="type_stage" id="typeStage" class="form-control"
                                    onchange="gererAffichage()">
                                    <option value="">Sélectionnez le type de stage</option>
                                    <option value="academique" {{ old('type_stage') == 'academique' ? 'selected' : '' }}>
                                        Académique</option>
                                    <option value="professionnel" {{ old('type_stage') == 'professionnel' ? 'selected' : '' }}>Professionnel</option>
                                </select>
                                @error('type_stage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group" id="ecoleGroup">
                                <label for="ecole">École</label>
                                <input type="text" class="form-control" id="ecole" name="ecole"
                                    placeholder="Nom de l'école" value="{{ old('ecole') }}">
                                @error('ecole')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group" id="cvGroup">
                                <label for="cv">CV</label>
                                <input type="file" class="form-control" id="cv" name="cv" accept=".pdf,.doc,.docx">
                                @error('cv')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="lettre">Lettre de demande</label>
                                <input type="file" class="form-control" id="lettre" name="lettre"
                                    accept=".pdf,.doc,.docx" required>
                                @error('lettre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mr-2 w-100">Envoyer la demande</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 tous droits par
                myInternship propulsé par Honorat SAGBO & Oscar Migan

        </div>

    </footer>
    <!-- partial -->
</div>
@endsection