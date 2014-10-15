<div class=" sidebar">
  <ul class="nav nav-sidebar">
    <li><a href="/">Home</a></li>

    <li><a href="/messages">Messages</a></li>

    @if(Auth::user()->role == 'admin')
    	<li><a href="/manageaccounts">Manage Accounts</a></li>
        <li><a href="/courses">Courses</a></li>
    @endif
    <li><a href="/friends">Friends</a></li>
    <li><a href="/classes">Classes</a></li>
    <li><a href="/tests">Tests</a></li>
    <li><a href="/homeworks">Homeworks</a></li>
    <li><a href="/editprofile">Edit Profile</a></li>
	<li><a href="/materials">Materials</a></li>

  </ul>
</div>
