@if (session()->has('notice'))
    <div class="alert alert-{{ session('notice')['alert'] }}">
      <p>{{ session('notice')['message'] }}</p>
    </div>
@endif