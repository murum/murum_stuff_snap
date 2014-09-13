@extends('layout.master')

@section('content')
    <h1>
        {{ Lang::get('letssnap.headers.create_card') }}</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-8">
            @include('cards.forms._card_form')
            @include('cards.forms._image_crop')
        </div>
        <div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4 col-md-offset-1 col-md-3">
          <div class="alert alert-info">
            {{{ Lang::get('letssnap.image_provided_by_kik') }}}
          </div>
            <div class="cards-item cards-item-{{ rand(1,4) }}">
              <div class="row">


                <div class="col-xs-5 col-sm-12">
                  <div class="cards-item-image">
                      <img id="image-preview" src="/images/placeholder_sv.png" alt=""/>
                  </div>
                </div>


                <div class="col-xs-7 col-sm-12">
                  <div class="cards-item-name">
                    <i class="icon icon-transgender"></i>
                    <span class="cards-item-name-text">
                      <span class="cards-item-name-text-update"></span>,
                    </span>
                    <span class="cards-item-name-age">
                      <span class="cards-item-name-age-text"></span>
                     {{{ Lang::get('letssnap.years') }}}
                     </span>
                  </div>

                  <div class="cards-item-description">
                    <p></p>
                  </div>
                </div>


                <div class="col-xs-12 no-padding">
                  <ul class="cards-item-usernames cards-item-usernames-0 row">

                    <li class="cards-item-usernames-snapchat hidden">
                      <a href="#">
                        <i class="icon icon-snapchaticon"></i>
                      </a>
                    </li>

                    <li class="cards-item-usernames-kik hidden">
                      <a href="#">
                        <i class="icon icon-kikicon"></i>
                      </a>
                    </li>

                    <li class="cards-item-usernames-instagram hidden">
                      <a href="#">
                        <i class="icon icon-instagramicon"></i>
                      </a>
                    </li>

                  </ul>
                </div>


              </div>
            </div>
        </div>
    </div>
@stop