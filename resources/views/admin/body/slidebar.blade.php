<nav class="sidebar">
    <div class="sidebar-header">
      <a href="{{route("admin.dashboard")}}" class="sidebar-brand">
        Real<span>ise</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="{{route("admin.dashboard")}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item nav-category">web apps</li>
       @can('proprety.type')
       <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">Property type</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="emails">
          <ul class="nav sub-menu">
          @can('All type')
          <li class="nav-item">
            <a href="{{route("all.type")}}" class="nav-link">All type</a>
          </li>
          @endcan
           @can("Add type")
           <li class="nav-item">
            <a href="{{route('create.type')}}" class="nav-link">add type</a>
          </li>
           @endcan
          </ul>
        </div>
      </li>
       @endcan
        
        
        @can('anities')  
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Aminities</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="emails">
            <ul class="nav sub-menu"> 
              @can('All aminites')
              <li class="nav-item">
                <a href="{{route("aminities.index")}}" class="nav-link">All Aminities</a>
              </li>
              @endcan 
              @can('Add aminites')
              <li class="nav-item">
                <a href="{{route('aminities.create')}}" class="nav-link">Add Aminities </a>
              </li> 
              @endcan
              
            </ul>
          </div>
        </li> 
        @endcan
         
        <li class="nav-item">
          <a href="pages/apps/calendar.html" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Calendar</span>
          </a>
        </li>
        <li class="nav-item nav-category">Components</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">UI Kit</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="uiComponents">
            <ul class="nav sub-menu">
              
              <li class="nav-item">
                <a href="pages/ui-components/modal.html" class="nav-link">Modal</a>
              </li>
               
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title">Advanced UI</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="advancedUI">
            <ul class="nav sub-menu">
             
              <li class="nav-item">
                <a href="pages/advanced-ui/sweet-alert.html" class="nav-link">Sweet Alert</a>
              </li>
            </ul>
          </div>
        </li> 
        <li class="nav-item nav-category">Role and permission</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title">Role and permission</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="advancedUI">
            <ul class="nav sub-menu">
             
              <li class="nav-item">
                <a href="{{route('permissions.index')}}" class="nav-link">All permissions</a>
              </li> 
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">All roles</a>
              </li> 
              <li class="nav-item">
                <a href="{{route('all.role.permission')}}" class="nav-link"> Role in Permission</a>
              </li>
              <li class="nav-item">
                <a href="{{route('create.roles.permission')}}" class="nav-link">Add Role in Permission</a>
              </li>
              
            </ul>
          </div>
        </li>  
        <li class="nav-item nav-category">Role and permission</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title">Admin List </span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="admin">
            <ul class="nav sub-menu">
             
              <li class="nav-item">
                <a href="{{route('admin.index')}}" class="nav-link">All admin</a>
              </li> 
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">add admin</a>
              </li> 
              
              
              
            </ul>
          </div>
        </li>  
        <li class="nav-item nav-category">Docs</li>
        <li class="nav-item">
          <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
            <i class="link-icon" data-feather="hash"></i>
            <span class="link-title">Documentation</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>