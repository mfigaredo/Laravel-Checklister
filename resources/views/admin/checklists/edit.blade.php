@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
          <div class="col-md-12">
              <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}">
                  @csrf
                  @method('PUT')
                  <div class="card-header">{{ __('Edit Checklist ') }} </div>
  
                  <div class="card-body">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" id="name" name="name" placeholder="{{ __('Checklist name') }}" class="form-control" value="{{ old('name', $checklist->name) }}">
                          </div>
                        </div>
                      </div>
                      
                  </div>
                  <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit">
                      {{ __('Save') }}
                    </button>
                  </div>
                </form>

              </div>

              <form action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete This Checklist') }}</button>
              </form>
          </div>
        </div>
    </div>
</div>
@endsection
