<form method="post" action="{{route('newposter')}}">
    @csrf

    <div class="form-group row {{ $errors->has('job_title')? 'has-error':'' }}">
        <label for="job_title" class="col-sm-4 control-label"> @lang('app.job_title')</label>
        <div class="col-sm-8">
            <input type="text" class="form-control {{e_form_invalid_class('job_title', $errors)}}" id="job_title" value="{{ old('job_title') }}" name="job_title" placeholder="@lang('app.job_title')">

            {!! e_form_error('job_title', $errors) !!}
        </div>
    </div>


    <input type="text" class="form-control {{e_form_invalid_class('position', $errors)}}" id="position" value="Casual Job" name="position" placeholder="@lang('app.position')" hidden>



    <div class="form-group row {{ $errors->has('category')? 'has-error':'' }}">
        <label for="category" class="col-sm-4 control-label">@lang('app.category')</label>
        <div class="col-sm-8">
            <select class="form-control {{e_form_invalid_class('category', $errors)}}" name="category" id="category">
                <option value="">@lang('app.select_category')</option>

                <option value="3">Casual Works</option>

            </select>

            {!! e_form_error('category', $errors) !!}
        </div>
    </div>

    <div class="form-group row {{ $errors->has('salary_cycle')? 'has-error':'' }}">
        <label for="salary_cycle" class="col-sm-4 control-label">@lang('app.salary_cycle')</label>
        <div class="col-sm-8">
            <div class="price_input_group">
                <select class="form-control {{e_form_invalid_class('salary_cycle', $errors)}}" name="salary_cycle" readonly>
                    {{--<option value="monthly" {{ old('salary_cycle') == 'monthly' ? 'selected':'' }}>@lang('app.monthly')</option>
                    <option value="yearly" {{ old('salary_cycle') == 'yearly' ? 'selected':'' }}>@lang('app.yearly')</option>
                    <option value="weekly" {{ old('salary_cycle') == 'weekly' ? 'selected':'' }}>@lang('app.weekly')</option>--}}
                    <option value="daily" {{ old('salary_cycle') == 'daily' ? 'selected':'' }}>@lang('app.daily')</option>
                    {{--<option value="hourly" {{ old('salary_cycle') == 'hourly' ? 'selected':'' }}>@lang('app.hourly')</option>--}}
                </select>

                {!! e_form_error('salary_cycle', $errors) !!}
            </div>
        </div>
    </div>


    <div class="form-group row {{ $errors->has('salary')? 'has-error':'' }}">
        <label for="salary" class="col-sm-4 control-label"> @lang('app.salary')</label>
        <div class="col-sm-8">


            <div class="form-group row">
                <div class="col-md-12">
                    <input type="number" class="form-control {{e_form_invalid_class('salary', $errors)}}" id="salary" value="{{ old('salary') }}" name="salary" placeholder="@lang('app.salary')">
                </div>
                {{--<div class="col-md-6">
                    <label> <input type="checkbox" name="is_negotiable" value="1" {{checked('1', old('is_negotiable'))}}> @lang('app.is_negotiable')</label>
                </div>--}}
            </div>

            {!! e_form_error('salary', $errors) !!}
        </div>
    </div>

    <div class="form-group row">
        <label for="salary_upto" class="col-sm-4 control-label"> @lang('Number Of Days')</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="number-days" name="number_days" placeholder="@lang('Number Of Days')" required>


        </div>
    </div>

    <div class="form-group row {{ $errors->has('salary_currency')? 'has-error':'' }}">
        <label for="salary_currency" class="col-sm-4 control-label">@lang('app.salary_currency')</label>
        <div class="col-sm-8">

            <div class="price_input_group">
                <input type="text" class="form-control" name="salary_currency" placeholder="GHC" readonly>

                {!! e_form_error('salary_currency', $errors) !!}
            </div>
        </div>
    </div>

    <div class="form-group row {{ $errors->has('vacancy')? 'has-error':'' }}">
        <label for="vacancy" class="col-sm-4 control-label"> @lang('Number Of Workers')</label>
        <div class="col-sm-8">
            <input type="number" class="form-control {{e_form_invalid_class('vacancy', $errors)}}" id="vacancy" value="{{ old('vacancy') }}" name="vacancy" placeholder="@lang('Number Of Workers')">

            {!! e_form_error('vacancy', $errors) !!}
        </div>
    </div>


    <div class="form-group row {{ $errors->has('gender')? 'has-error':'' }}">
        <label for="gender" class="col-sm-4 control-label">@lang('app.gender')</label>
        <div class="col-sm-8">
            <select class="form-control {{e_form_invalid_class('gender', $errors)}}" name="gender" id="gender">
                <option value="any" {{ old('gender') == 'any' ? 'selected':'' }}>@lang('app.any')</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected':'' }}>@lang('app.male')</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected':'' }}>@lang('app.female')</option>
                <option value="transgender" {{ old('gender') == 'transgender' ? 'selected':'' }}>@lang('app.transgender')</option>
            </select>

            {!! e_form_error('gender', $errors) !!}
        </div>
    </div>


    <div class="form-group row {{ $errors->has('exp_level')? 'has-error':'' }}">
        <label for="exp_level" class="col-sm-4 control-label">@lang('app.exp_level')</label>
        <div class="col-sm-8">
            <select class="form-control {{e_form_invalid_class('exp_level', $errors)}}" name="exp_level" id="exp_level">
                <option value="mid" {{ old('exp_level') == 'mid' ? 'selected':'' }}>@lang('app.mid')</option>
                <option value="entry" {{ old('exp_level') == 'entry' ? 'selected':'' }}>@lang('app.entry')</option>
                <option value="senior" {{ old('exp_level') == 'senior' ? 'selected':'' }}>@lang('app.senior')</option>
            </select>

            {!! e_form_error('exp_level', $errors) !!}
        </div>
    </div>



    <div class="form-group row {{ $errors->has('job_type')? 'has-error':'' }}">
        <label for="job_type" class="col-sm-4 control-label">@lang('app.job_type')</label>
        <div class="col-sm-8">
            <select class="form-control {{e_form_invalid_class('job_type', $errors)}}" name="job_type" id="job_type">

                <option value="contract" {{ old('job_type') == 'contract' ? 'selected':'' }}>@lang('app.contract')</option>

            </select>

            {!! e_form_error('job_type', $errors) !!}
        </div>
    </div>



    <input type="number" class="form-control" id="experience_required_years" value="0" name="experience_required_years" placeholder="@lang('app.experience_required_years')" hidden>

    <div class="form-group row {{ $errors->has('deadline')? 'has-error':'' }}">
        <label for="deadline" class="col-sm-4 control-label"> @lang('app.deadline')</label>
        <div class="col-sm-8">
            <input type="text" class="form-control {{e_form_invalid_class('deadline', $errors)}} date_picker" id="deadline" value="{{ old('deadline') }}" name="deadline" placeholder="@lang('app.deadline')">

            {!! e_form_error('deadline', $errors) !!}
        </div>
    </div>

    <div class="form-group row {{ $errors->has('description')? 'has-error':'' }}">
        <label class="col-sm-4 control-label"> @lang('app.description')</label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control {{e_form_invalid_class('description', $errors)}}" rows="5">{{ old('description') }}</textarea>
            {!! $errors->has('description')? '<p class="help-block">'.$errors->first('description').'</p>':'' !!}
            <p class="text-info"> @lang('app.description_info_text')</p>
        </div>
    </div>





    <div class="form-group row {{ $errors->has('apply_instruction')? 'has-error':'' }}">
        <label class="col-sm-4 control-label"> @lang('app.apply_instruction')</label>
        <div class="col-sm-8">
            <textarea name="apply_instruction" class="form-control {{e_form_invalid_class('apply_instruction', $errors)}}" rows="3">{{ old('apply_instruction') }}</textarea>
            {!! $errors->has('apply_instruction')? '<p class="help-block">'.$errors->first('apply_instruction').'</p>':'' !!}
            <p class="text-info"> @lang('app.apply_instruction_info_text')</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 control-label"> @lang('Total Wages')</label>
        <div class="col-sm-8">
            <input name="totalwages" id="total-wages" class="form-control" rows="3" placeholder="0.00" value="{{old('totalwages')}}" readonly>
            <p class="text-info"> Total wages to be paid when work is done</p>
        </div>
    </div>

    <legend>@lang('app.job_location')</legend>


    {{--<div class="form-group row {{ $errors->has('is_any_where')? 'has-error':'' }}">
        <label for="is_any_where" class="col-md-4 control-label">{{ __('app.is_any_where') }} </label>
        <div class="col-md-8">
            <label> <input type="checkbox" name="is_any_where" value="1" {{checked('1', old('is_any_where'))}} > @lang('app.location_anywhere') </label>
            {!! e_form_error('is_any_where', $errors) !!}
        </div>
    </div>--}}


    <div class="form-group row {{ $errors->has('country')? 'has-error':'' }}">
        <label for="country" class="col-md-4 control-label">{{ __('app.country') }} <span class="mendatory-mark">*</span></label>
        <div class="col-md-8">
            <select name="country" class="form-control {{e_form_invalid_class('country', $errors)}} country_to_state">
                <option value="">@lang('app.select_a_country')</option>
                @foreach($countries as $country)
                    <option value="{!! $country->id !!}" @if(old('country') && $country->id == old('country')) selected="selected" @endif  >{!! $country->country_name !!}</option>
                @endforeach
            </select>

            {!! e_form_error('country', $errors) !!}
        </div>
    </div>

    <div class="form-group row">
        <label for="state" class="col-md-4 control-label">{{ __('Region/State') }} </label>
        <div class="col-md-8">
            <select name="state" class="form-control {{e_form_invalid_class('state', $errors)}} state_options">
                <option value="">Select Region</option>

                @if($old_country)
                    @foreach($old_country->states as $state)
                        <option value="{{$state->id}}" @if(old('state') && $state->id == old('state')) selected="selected" @endif >{!! $state->state_name !!}</option>
                    @endforeach
                @endif

            </select>
            {!! e_form_error('state', $errors) !!}
        </div>
    </div>

    <div class="form-group row {{ $errors->has('city_name')? 'has-error':'' }}">
        <label for="city_name" class="col-sm-4 control-label"> @lang('app.city_name')</label>
        <div class="col-sm-8">
            <input type="text" class="form-control {{e_form_invalid_class('city_name', $errors)}}" id="city_name" value="{{ old('city_name') }}" name="city_name" placeholder="@lang('app.city_name')">

            {!! e_form_error('city_name', $errors) !!}
        </div>
    </div>


    {{--  <div class="alert alert-warning">

          <legend>@lang('app.premium_job')</legend>

          <div class="form-group row {{ $errors->has('is_premium')? 'has-error':'' }}">
              <label for="is_premium" class="col-md-4 control-label">{{ __('app.is_premium') }} </label>
              <div class="col-md-8">
                  @php
                      $employer = auth()->user();
                  @endphp

                  @if($employer->premium_jobs_balance)
                      <label> <input type="checkbox" name="is_premium" value="1" {{checked('1', old('is_premium'))}} > @lang('app.location_anywhere') </label>
                  @else
                      <a href="{{route('pricing')}}" target="_blank">You don't have any premium jobs balance to add premium jobs, please purchase a package to earn ability of posting premium jobs</a>
                  @endif
              </div>
          </div>

      </div>--}}

    <div class="form-group row">
        <label class="col-sm-4"></label>
        <div class="col-sm-8">
            <button type="submit" class="btn btn-primary">@lang('app.post_new_job')</button>
        </div>
    </div>
</form>
