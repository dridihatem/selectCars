<div class="col-lg-3">
                    <div class="widget-offcanvas offcanvas-lg offcanvas-start" tabindex="-1" id="widgetOffcanvas" aria-labelledby="widgetOffcanvas">
                        <div class="offcanvas-header px-20">
                            <h4 class="offcanvas-title">Filtre</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#widgetOffcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body p-3 p-lg-0">
                            <aside class="widget-area" data-aos="fade-up">
                            <form action="{{ route('search')}}" method="GET">
                                    
                                <div class="widget p-0 mb-40">
                                    <h5 class="title">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#brands" aria-expanded="true" aria-controls="brands"> 
                                            Marques
                                        </button>
                                    </h5>
                                    <div id="brands" class="collapse show">
                                        <div class="accordion-body scroll-y mt-20">
                                            <ul class="list-group custom-radio">

                                            @foreach ($marquefetch as $list_marque)
                                            <li>
                                                    <input class="input-radio" type="radio" name="marque" id="radio{{ $list_marque->id }}" value="{{ $list_marque->id }}">
                                                    <label class="form-radio-label" for="radio{{ $list_marque->id }}"><span>{{ $list_marque->titre }}</span><span class="qty">(@php echo  \App\Models\Voiture::where('marque_id',$list_marque->id)->count(); @endphp)</span></label>
                                                </li>
                                            @endforeach
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget widget-select p-0 mb-40">
                                    <h5 class="title">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#select" aria-expanded="true" aria-controls="select"> 
                                          Je suis à la recherche de
                                        </button>
                                    </h5>
                                    <div id="select" class="collapse show">
                                        <div class="accordion-body scroll-y mt-20">
                                            <div class="row gx-sm-3">
                                                <div class="col-xl-6">
                                                    <div class="form-group">
                                                        <label class="mb-1 color-dark">{{ trans('generale.nature')}}</label>
                                                        <select class="form-select form-control" name="nature">
                                                            <option value="utilitaire">Utilitaire</option>
                                                            <option value="tourisme">Tourisme</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-group">
                                                        <label class="mb-1 color-dark">{{ trans('generale.energie')}}</label>
                                                        <select class="form-select form-control" name="energie">
                                                            <option value="tous">Tous</option>
                                                            <option selected value="essence">{{ trans('generale.essence')}}</option>
                                                            <option value="diesel">{{ trans('generale.diesel')}}</option>
                                                            <option value="hybrides">{{ trans('generale.hybrides')}}</option>
                                                            <option value="electriques">{{ trans('generale.electriques')}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-group mt-20">
                                                        <label class="mb-1 color-dark">{{ trans('generale.categorie')}}</label>
                                                        <select class="form-select form-control" name="categories">
                                                            @foreach ($categorieslist as $listCategorie)
                                                                <option value="{{ $listCategorie->id}}">{{ $listCategorie->titre}}</option>
                                                            @endforeach
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-xl-6">
                                                    <div class="form-group mt-20">
                                                        <label class="mb-1 color-dark">{{ trans('generale.modele')}}</label>
                                                        <select class="form-select form-control" name="modele">
                                                            <option value="" selected>Tous les modèles</option>
                                                    @foreach ($modele as $list_model )
                                                        <option value="{{$list_model->titre}}">{{$list_model->titre}}</option>
                                                    @endforeach
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group mt-20">
                                                        <label class="mb-1 color-dark">{{ trans('generale.cylindre')}}</label>
                                                      <input type="number" min=2 name="cylindre" class="form-control" />
                                                    </div>
                                                </div>
                                               
                                                <div class="col-xl-6"> 
                                                   
                                                    <div class="form-group mt-20">
                                                        <label class="mb-1 color-dark">{{ trans('generale.annee')}} entre</label>
                                                        <input type="number" class="form-control" min='2000' name="annee_min" value="2000" />
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-group mt-20">
                                                    <label class="mb-1 color-dark">Et</label>
                                                        <input type="number" class="form-control" min='2000' value="{{ date('Y')}}" name="annee_max" />
                                                       
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget widget-price p-0 mb-40">
                                    <h5 class="title">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#price" aria-expanded="true" aria-controls="price"> 
                                        {{ trans('generale.prix')}}
                                        </button>
                                    </h5>
                                    <div id="price" class="collapse show">
                                        <div class="accordion-body scroll-y mt-20">
                                            <div class="row gx-sm-3">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-30">
                                                        <label class="mb-1 color-dark">Minimum</label>
                                                        <input class="form-control" type="number" name="prix_min" id="min">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-30">
                                                        <label class="mb-1 color-dark">Maximum</label>
                                                        <input class="form-control" type="number" name="prix_max" id="max">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-item">
                                                <div class="price-slider" data-range-slider='filterPriceSlider'></div>
                                                <div class="price-value">
                                                    <span class="color-dark">{{ trans('generale.prix')}}: 
                                                        <span class="filter-price-range" data-range-value='filterPriceSliderValue'></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="cta">
                                    <button class="btn btn-lg btn-primary icon-start w-100" type="submit"><i class="fal fa-search"></i>{{ trans('generale.trouver')}}</button>
                                </div>
                                <!-- Spacer -->
                                <div class="pb-40 d-none d-lg-block"></div>
                            </form>
                            </aside>
                        </div>
                    </div>
                </div>