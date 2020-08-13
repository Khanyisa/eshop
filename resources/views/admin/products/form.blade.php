@extends('layouts.app')

@section('content')
    
@php
    $formTitle = !empty($product) ? 'Update' : 'New'    
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-9">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>{{ $formTitle }} Product</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($product))
                        {!! Form::model($product, ['url' => ['admin/products', $product->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                        {!! Form::hidden('type') !!}
                    @else
                        {!! Form::open(['url' => 'admin/products']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('type', 'Type') !!}
                            {!! Form::select('type', $types , !empty($product) ? $product->type : null, ['class' => 'form-control product-type', 'placeholder' => '-- Choose Product Type --', 'disabled' => !empty($product)]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('sku', 'SKU') !!}
                            {!! Form::text('sku', null, ['class' => 'form-control', 'placeholder' => 'sku']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('price', 'Price') !!}
                            {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('weight', 'Weight') !!}
                            {!! Form::number('weight', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('height', 'Height') !!}
                            {!! Form::number('height', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('width', 'Width') !!}
                            {!! Form::number('width', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('depth', 'Depth') !!}
                            {!! Form::text('depth', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('category_ids', 'Category') !!}
                            {!! General::selectMultiLevel('category_ids[]', $categories, ['class' => 'form-control', 'multiple' => true, 'selected' => !empty(old('category_ids')) ? old('category_ids') : $categoryIDs, 'placeholder' => '-- Choose Category --']) !!}
                        </div>

                        <div class="configurable-attributes">
                            @if (!empty($configurableAttributes) && empty($product))
                                <p class="text-primary mt-4">Configurable Attributes</p>
                                <hr/>
                                @foreach ($configurableAttributes as $attribute)
                                    <div class="form-group">
                                        {!! Form::label($attribute->code, $attribute->name) !!}
                                        @if($attribute->type== 'text')
                                        {!! Form::text($attribute->code. '[]', $attribute->attributeOptions->pluck('name','id'), null, ['class' => 'form-control', 'multiple' => true]) !!}
                                        @elseif($attribute->type == 'textarea')
                                        {!!Form::textarea($attribute->code. '[]', $attribute->attributeOptions->pluck('name','id'), null, ['class' => 'form-control', 'multiple' => true]) !!}
                                        @elseif($attribute->type == 'select')
                                        {!! Form::select($attribute->code. '[]', $attribute->attributeOptions->pluck('name','id'), null, ['class' => 'form-control', 'multiple' => true]) !!}
                                        @elseif($attribute->type == 'datetime' || $attribute->type() == 'date')
                                        {!! Form::date($attribute->code. '[]', $attribute->attributeOptions->pluck('name','id'), null, ['class' => 'form-control', 'multiple' => true]) !!}
                                        @elseif($attribute->type == 'price')
                                        {!! Form::number($attribute->code. '[]', $attribute->attributeOptions->pluck('name','id'), null, ['class' => 'form-control', 'multiple' => true]) !!}
                                        @elseif($attribute->type == 'boolean')
                                        {!! Form::radio($attribute->code. '[]', $attribute->attributeOptions->pluck('name','id'), null, ['class' => 'form-control', 'multiple' => true]) !!}
                                          
                                        @endif()    
                                    </div>
                                @endforeach
                            @endif
                        </div>


                            <div class="form-group">
                                {!! Form::label('short_description', 'Short Description') !!}
                                {!! Form::textarea('short_description', null, ['class' => 'form-control', 'placeholder' => 'short description']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'Description') !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'description']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('status', 'Status') !!}
                                {!! Form::select('status', $statuses , null, ['class' => 'form-control', 'placeholder' => '-- Set Status --']) !!}
                            </div>
                    
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                            <a href="{{ url('admin/products') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection