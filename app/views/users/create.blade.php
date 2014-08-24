@extends('layout.master')

@section('content')
    <h1>
        {{ Lang::get('letssnap.headers.create_card') }}</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-8">
            @include('users.forms._user_form')
            @include('users.forms._image_crop')
        </div>
        <div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4 col-md-offset-1 col-md-3">
          <div class="alert alert-info">
            {{{ Lang::get('letssnap.image_provided_by_kik') }}}
          </div>
            <div class="users-item users-item-{{ rand(1,4) }}">
              <div class="row">


                <div class="col-xs-5 col-sm-12">
                  <div class="users-item-image">
                      <img id="image-preview" src="/images/placeholder_sv.png" alt=""/>
                  </div>
                </div>


                <div class="col-xs-7 col-sm-12">
                  <div class="users-item-name">
                    <i class="icon icon-transgender"></i>
                    <span class="users-item-name-text">
                      <span class="users-item-name-text-update"></span>,
                    </span>
                    <span class="users-item-name-age">
                      <span class="users-item-name-age-text"></span>
                     {{{ Lang::get('letssnap.years') }}}
                     </span>
                  </div>

                  <div class="users-item-description">
                    <p></p>
                  </div>
                </div>


                <div class="col-xs-12 no-padding">
                  <ul class="users-item-usernames users-item-usernames-1 row">

                    <li class="users-item-usernames-snapchat">
                      <a href="#">
                        <i class="icon icon-snapchaticon"></i>
                      </a>
                    </li>

                    <li class="users-item-usernames-kik hidden">
                      <a href="#">
                        <i class="icon icon-kikicon"></i>
                      </a>
                    </li>

                    <li class="users-item-usernames-instagram hidden">
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