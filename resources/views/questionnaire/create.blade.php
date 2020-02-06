@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="row">
		<div class="col-2"></div>
		<div class="col-8">
			<form action="/questionnaire" method="post">

				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp"placeholder="Enter title of questionnaire">
					<small id="titleHelp" class="form-text text-muted">Give your questionaire a title that attrats attention</small>
					@error('title')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>
				<div class="form-group">
				    <label for="purpose">Purpose</label>
				    <input type="text" class="form-control" name ="purpose" id="purpose" aria-describedby="purposeHelp" placeholder="Enter your purpose of questionnaire">
				    <small id="titleHelp" class="form-text text-muted">Giving a purpose that increase responses </small>
				    @error('purpose')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>
				@csrf
				<button type="submit" class="btn btn-primary">SAVE</button>
			</form>
		</div>
	</div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
