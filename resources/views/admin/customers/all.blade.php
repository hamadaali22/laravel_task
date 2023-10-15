@extends('layout.admin_main')
@section('content')

<div class="content-header row">
	<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
		<h3 class="content-header-title mb-0 d-inline-block">العملاء</h3><br>
		<div class="row breadcrumbs-top d-inline-block">
			<div class="breadcrumb-wrapper col-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">الرئيسية</a>
					</li>
					<li class="breadcrumb-item active">العملاء
					</li>
				</ol>
			</div>
		</div>
	</div>
	<div class="content-header-right col-md-6 col-12">
		<div class="dropdown float-md-right">
			<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">اضافة عميل</a>
		</div>
	</div>

	@if (session('message'))
	<div class="alert alert-success">
		{{ session('message') }}
	</div>
	@endif

	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<button aria-label="Close" class="close" data-dismiss="alert" type="button">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>خطا</strong>
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
</div>
<section id="keytable">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"></h4>
					<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
							<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
							<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
							<li><a data-action="close"><i class="ft-x"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-content collapse show">
					<div class="card-body card-dashboard">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered keytable-integration">
									<thead>
										<tr>
											<th class="text-center">اسم العميل</th>
											<th class="text-center">البيرد الإلكتروني</th>
											<th>الصورة</th>
											<th class="text-center">العمليات</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($customers as $_item)
										<tr>

											<td class="text-center">
												{{$_item->name}}
											</td>
											<td class="text-center">
												{{$_item->email}}
											</td>
											<td class="text-center">
												<img class="avatar-img" src="{{asset('img/'.$_item->picture) }}" alt="Speciality" width="50" height="50">
											</td>
											<td class="text-center">
												<div class="actions">
													<a class="btn btn-sm bg-success-light" data-toggle="modal"
													data-name ="{{$_item->name}}"
													data-email ="{{$_item->email}}"
													data-password ="{{$_item->password}}"
													data-nationality ="{{$_item->nationality}}"
													data-address ="{{$_item->address}}"
													data-catid="{{ $_item->id }}"
													data-target="#edit">
													<button type="button" class="btn btn-outline-success "><i class="la la-edit"></i></button>
												</a>
												<a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete" class="delete-course">
													<button type="button" class=" btn btn-outline-warning"><i class="la la-trash-o"></i></button>
												</a>
											</div>
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
</div>



<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">اضافة </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('customers.store')}}" method="POST"
				name="le_form"  enctype="multipart/form-data">
				@csrf
				<div class="row form-row">
					<div class="col-12 col-sm-12">
						<div class="form-group">
							<label>اسم العميل</label>
							<input type="text" name="name" class="form-control" value="{{old('name')}}">
						</div>
					</div>
					<div class="col-12 col-sm-12">
						<div class="form-group">
							<label>البريد الإلكتروني</label>
							<input type="text" name="email" class="form-control" value="{{old('email')}}">
						</div>
					</div>
					<div class="col-12 col-sm-12">
						<div class="form-group">
							<label>كلمة المرور</label>
							<input type="text" name="password" class="form-control" value="{{old('password')}}">
						</div>
					</div>
					<div class="col-12 col-sm-12">
						<div class="form-group">
							<label>الجنسية</label>
							<input type="text" name="nationality" class="form-control" value="{{old('nationality')}}">
						</div>
					</div>
					<div class="col-12 col-sm-12">
						<div class="form-group">
							<label>العنوان</label>
							<input type="text" name="address" class="form-control" value="{{old('address')}}">
						</div>
					</div>
					<div class="col-12 col-sm-12">
						<div class="form-group">
							<label>الصورة</label>
							<input type="file" name="picture" class="form-control" >
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary btn-block">اضافة </button>
			</form>
		</div>
	</div>
</div>
</div>
<!-- /ADD Modal -->

<!-- Edit Details Modal -->
<div class="modal fade" id="edit" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">تعديل </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form  method="post" action="{{route('customers.update','test')}}" enctype="multipart/form-data">
					@csrf
					@method('put')

					<div class="row form-row">
						<input type="hidden" name="id" id="cat_id" >
						<div class="col-12 col-sm-12">
							<div class="form-group">
								<label>اسم العميل</label>
								<input type="text" name="name" class="form-control" id="name" >

							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>البريد الإلكتروني </label>
								<input type="text" name="email" class="form-control" id="email" >
							</div>
						</div>
						<!-- <div class="col-12 col-sm-6">
						<div class="form-group">
						<label>كلمة المرر</label>
						<input type="text" name="password" class="form-control" id="password" >
					</div>
				</div> -->
				<div class="col-12 col-sm-6">
					<div class="form-group">
						<label>الجنسية</label>
						<input type="text" name="nationality" class="form-control" id="nationality" >
					</div>
				</div>
				<div class="col-12 col-sm-6">
					<div class="form-group">
						<label>العنوان</label>
						<input type="text" name="address" class="form-control" id="address" >
					</div>
				</div>
				<div class="col-12 col-sm-6">
					<div class="form-group">
						<label>الصورة</label>
						<input type="file" name="picture"  class="form-control" accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF">
					</div>
				</div>



			</div>
			<button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>
		</form>



	</div>
</div>
</div>
</div>
<!-- /Edit Details Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-content p-2">
					<h4 class="modal-title">حذف</h4>
					<p class="mb-4">هل انت متأكد من حذف هذا العنصر ؟</p>
					<div class="row text-center">
						<div class="col-sm-3">
						</div>
						<div class="col-sm-2">
							<form method="post" action="{{route('customers.destroy','test')}}">
								@csrf
								@method('delete')
								<input type="hidden" name="id" id="cat_id" >
								<button type="submit" class="btn btn-primary">حذف </button>
							</form>
						</div>
						<div class="col-sm-2">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>



<script src="{{asset('js/app.js')}}"></script>

<script>
$('#edit').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget)
	var name = button.data('name')
	var email = button.data('email')
	// var password = button.data('password')
	var nationality = button.data('nationality')
	var address = button.data('address')
	var cat_id = button.data('catid')
	var modal = $(this)

	modal.find('.modal-body #name').val(name);
	modal.find('.modal-body #email').val(email);
	// modal.find('.modal-body #password').val(password);
	modal.find('.modal-body #nationality').val(nationality);
	modal.find('.modal-body #address').val(address);
	modal.find('.modal-body #cat_id').val(cat_id);
})


$('#delete').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget)
	var cat_id = button.data('catid')
	var modal = $(this)
	modal.find('.modal-body #cat_id').val(cat_id);
})


</script>

@endsection
