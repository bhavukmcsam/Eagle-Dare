<form method="post" action="{{ route('postCustomerdetails') }}">
  @csrf
<div class="form-group">
  <label>First Name</label>
  <input type="text" name="first_name" class="form-control p_input">
</div>
<div class="form-group">
  <label>Last Name</label>
  <input type="text" name="last_name" class="form-control p_input">
</div>


<div class="text-center">
  <button type="submit" class="btn btn-primary btn-block enter-btn">Submit</button>
</div>
</form>
 