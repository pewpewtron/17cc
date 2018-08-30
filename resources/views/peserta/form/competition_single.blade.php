<div id="bg-signup" >
    <div class="container">
    	<div class="row" style="margin-top: 90px;">

    		<div class="d-none d-xl-block col-md-4 box" style="background: #232323; max-height: 650px; margin-top: 50px;">
                <img src="{{asset('asset/images/logo-itcc5.png')}}" style=" width: 70%;margin-left: 65px;margin-top: 70px;" class="img-responsive center-block ">
                     
                <h5 style="color:#a2c8cc; text-align: center;">"Powering Smart Society with Information Technology"</h5>
                <h4 style="color: white; text-align: center;">{{$competition->long_name}}</h4>
                <hr style="width: 80%; color: white; margin-bottom: 5px;">
                <p style="color: white; text-align: center; font-size: 12px;">
                    {{$competition->description}}
                </p>

                <p style="margin-left: 105px;"><a href="https://www.facebook.com/ITCC.Udayana"><img style="width: 30px;" src="{{asset('asset/images/facebook.png')}}"></a><a href="https://twitter.com/ITCCUdayana"><img style="width: 30px;" src="{{asset('asset/images/twitter.png')}}"></a><a href="https://www.instagram.com/itcc_udayana/"><img style="width: 30px;" src="{{asset('asset/images/instagram.png')}}"></a><a href="https://ask.fm/itcc_udayana"><img style="width: 30px;" src="{{asset('asset/images/Askfm.png')}}"></a><a href="https://bit.ly/ITCCUdayana"><img style="width: 30px;" src="{{asset('asset/images/line.png')}}"></a></p>
            </div>

            <div class="col-md-8 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms" style="margin-top: 50px;">
            	<form action="{{url('/daftar')}}" class="form-horizontal" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" value="{{$competition->id}}" name="competition_id" />
            	<div class="card mb-2" style="border-radius: 0px">
        			<div class="card-body" style="padding: 32px;">
        				<h4 class="card-title mb-4" style="text-align: center">DATA DIRI</h4>
        				<div class="form-group row">
             				<label class="col-form-label col-md-3">Asal Sekolah</label>
             				<div class="col-md-9">
                 				<input class="form-control{{ $errors->has('institution') ? ' is-invalid' : '' }}" placeholder="ex. 'SMA/SMK Permata'" name="institution" type="text" value="{{old('institution')}}">

                 				@if ($errors->has('institution'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('institution') }}</strong>
                                    </span>
                                @endif
             				</div>
           				</div>

           				<div class="form-group row">
                            <label class="col-form-label col-md-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}" placeholder="ex. 'Nama Brata'" name="full_name" type="text" value="{{old('full_name')}}">

                                @if ($errors->has('full_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-9">
                                <input class="form-control {{ $errors->has('birthdate') ? ' is-invalid' : '' }}" placeholder="ex. '1995/12/27'" name="birthdate" type="date" value="{{old('birthdate')}}">

                                @if ($errors->has('birthdate'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="ex. 'mail@site.com'" name="email" type="email" value="{{old('email')}}">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                        	<label class="col-form-label col-md-3">Nomor Kontak</label>
                            <div class="col-md-9">
                                <input class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" placeholder="ex. '081632111111'" name="contact" type="number" value="{{old('contact')}}">

                                @if ($errors->has('contact'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Vegetarian</label>
                            <div class="col-md-9">
                               <label><input {{ old('vegetarian')=="1"?"checked":"" }} class="{{ $errors->has('vegetarian') ? ' is-invalid' : '' }}" type="radio" value="1" name="vegetarian"> Ya </label> <label><input {{ old('vegetarian')=="0"?"checked":"" }}  type="radio" value="0" class="{{ $errors->has('vegetarian') ? ' is-invalid' : '' }}" name="vegetarian"> Tidak</label>
                               @if ($errors->has('vegetarian'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('vegetarian') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Kartu Identitas</label>
                            <div class="col-md-9">
                                <input name="photo" type="file" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" accept="image/*" id="imgInp">
                                <small>Gambar dalam bentuk file .jpg</small>

                                @if ($errors->has('photo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                                <br><img id="blah" src="#" alt="" style="margin-top: 20px; max-height: 500px; margin-bottom: 10px;"/><br><br>
                            </div>
                        </div>
                        <div class="form-group row">
                          	<label class="col-form-label col-md-3">Baju Peserta</label>
                          	<div class="col-md-9">
                              	<label><input {{ old('buy_shirt')=="1"?"checked":"" }} type="radio" id="baju-yes" class="{{ $errors->has('buy_shirt') ? ' is-invalid' : '' }}" value="1" name="buy_shirt"> Ya </label> <label><input {{ old('buy_shirt')=="0"?"checked":"" }} type="radio" id="baju-no" class="{{ $errors->has('buy_shirt') ? ' is-invalid' : '' }}" value="0" name="buy_shirt"> Tidak</label><br>
                              	<small>Apabila Anda membeli baju peserta, akan dikenakan biaya tambahan sebesar Rp</small><small id="harga_baju">{{$harga_baju}}</small>
                              	@if ($errors->has('buy_shirt'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('buy_shirt') }}</strong>
                                    </span>
                                @endif
                          	</div>
                        </div>
                        <div class="form-group row" id="ukuran-baju" style="display: none;">
                          	<label class="col-form-label col-md-3">Ukuran Baju</label>
                          	<div class="col-md-9">
                                <select id="select-ukuran" name="size" class="form-control" >
	                                <option value="">Pilih Ukuran Baju</option>
	                                <option value="s">Small</option>
	                                <option value="m">Medium</option> 
	                                <option value="l">Large</option>
	                                <option value="xl">Extra Large</option>          
                                </select>
                                <small>*Desain baju dapat dilihat </small> <a data-toggle="modal" data-target="#sizeChart" href="#">disini</a>
                          </div>
                        </div>
        			</div>
        		</div>


        		<div class="card mb-2" style="border-radius: 0px">
        			<div class="card-body" style="padding: 32px;">
        				<h4 class="card-title mb-4" style="text-align: center">DATA AUTENTIFIKASI</h4>
        				<div class="form-group row">
                        	<label class="col-form-label col-md-3">Username</label>
                            <div class="col-md-9">
                                <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="nama pengguna" name="username" type="text" value="{{old('username')}}">

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Password</label>
                            <div class="col-md-9">
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="kata sandi" name="password" id="pass" type="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Konfirmasi Password</label>
                        	<div class="col-md-9">
                                <input class="form-control" placeholder="ulangi kata sandi" name="password_confirmation" id="pass2nd" type="password">
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                                 <!-- <span id='message'></span> -->
                            </div>
                        </div>
        			</div>
        		</div>
        		<div class="card" style="border-radius: 0px; margin-bottom: 30px;">
        			<div class="card-body">
        				<button class="btn btn-primary btn-block" type="submit">Daftar</button>
        			</div>
        		</div>
        		</form>
            	
            </div>
    	</div>
    </div>
</div>

<!--Modal-->
<div class="modal fade" id="sizeChart" role="dialog">
    <div class="modal-dialog modal-lg"> 
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <img src="{{ asset('/sponsor/desain.jpg') }}" style="max-height: 530px;">
            </div>
        </div>
    </div>
</div>
<!--End Modal-->
<!--//HEADER WEBSITE-->
<script>
	$('#baju-yes').click(function(e){
		$('#ukuran-baju').show();
	});
	$('#baju-no').click(function(e){
		$('#ukuran-baju').hide();
	});
</script>
<script type="text/javascript">
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>