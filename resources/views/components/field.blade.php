@props([])

<div class="mb-3">
  @if($attributes->get('required'))
    <i class="mr-1 fas fa-asterisk text-danger"></i>
  @endif
  <label for="{{ $attributes->get('id') }}">{{ $slot }}</label>
  <input
    {{
      $attributes
        ->class([
          'form-control',
          ])
        ->merge(['type' => 'text', 'autocomplete' => 'off'])
    }}
  >
  @error($attributes->get('name'))
    <p class="text-danger">{{ ucfirst($message) }}</p>
  @enderror
</div>