<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    /* Reset and base styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    body {
      background-color: #f9fafb;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1rem;
    }

    /* Card styles */
    .card {
      background-color: white;
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      width: 100%;
      max-width: 28rem;
      overflow: hidden;
    }

    .card-header {
      padding: 1.5rem 1.5rem 1rem;
    }

    .card-title {
      font-size: 1.5rem;
      font-weight: 700;
      text-align: center;
      color: #111827;
      margin-bottom: 0.5rem;
    }

    .card-description {
      text-align: center;
      color: #6b7280;
      font-size: 0.875rem;
    }

    .card-content {
      padding: 1rem 1.5rem;
    }

    .card-footer {
      padding: 1rem 1.5rem 1.5rem;
    }

    /* Form styles */
    .form-group {
      margin-bottom: 1rem;
    }

    .input-wrapper {
      position: relative;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 0.5rem 0.75rem 0.5rem 2.5rem;
      border: 1px solid #d1d5db;
      border-radius: 0.375rem;
      font-size: 0.875rem;
      line-height: 1.5;
      color: #111827;
      background-color: white;
      transition: border-color 0.15s ease-in-out;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
      outline: none;
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
    }

    .input-icon {
      position: absolute;
      left: 0.75rem;
      top: 50%;
      transform: translateY(-50%);
      color: #6b7280;
      width: 1rem;
      height: 1rem;
    }

    .password-toggle {
      position: absolute;
      right: 0.75rem;
      top: 50%;
      transform: translateY(-50%);
      background: transparent;
      border: none;
      cursor: pointer;
      color: #6b7280;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .btn {
      display: inline-block;
      font-weight: 500;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      user-select: none;
      border: 1px solid transparent;
      padding: 0.5rem 1rem;
      font-size: 0.875rem;
      line-height: 1.5;
      border-radius: 0.375rem;
      transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
      cursor: pointer;
    }

    .btn-primary {
      color: white;
      background-color: #3b82f6;
      border-color: #3b82f6;
      width: 100%;
      padding: 0.625rem 1.25rem;
    }

    .btn-primary:hover {
      background-color: #2563eb;
      border-color: #2563eb;
    }

    a {
      color: #3b82f6;
      text-decoration: none;
      font-weight: 500;
    }

    a:hover {
      color: #2563eb;
      text-decoration: underline;
    }

    .text-center {
      text-align: center;
    }

    .mt-4 {
      margin-top: 1rem;
    }
  </style>
</head>

<body>
  <div class="card">
    <div class="card-header">
      <h1 class="card-title">Register</h1>
    </div>
    <!-- Form for login -->
    <form method="POST" action="{{ route('registerjuri') }}">
      @csrf
      <div class="card-content">
        <div class="form-group">
          <label for="email">Email</label>
          <div class="input-wrapper">
            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <input type="email" id="email" name="email" placeholder="email@example.com" required>
          </div>
          
        </div>


        <div class="form-group">
          <label for="email">Nama Lengkap</label>
          <div class="input-wrapper">
            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <input type="text" id="username" name="username" placeholder="Nama Lengkap" required>
          </div>
          
        </div>



        
        <div class="form-group">
          <label for="email">Nama Panggilan</label>
          <div class="input-wrapper">
            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <input type="text" id="name" name="name" placeholder="Nama Panggilan" required>
          </div>
          
        </div>

        
        <div class="form-group">
          <div class="input-wrapper">
            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>
            <input type="password" id="password" name="password" placeholder="••••••••" required>
            <button type="button" class="password-toggle" id="togglePassword" aria-label="Show password">
              <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
              </svg>
              <svg id="eyeOffIcon" class="hidden" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                <line x1="1" y1="1" x2="23" y2="23"></line>
              </svg>
            </button>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Sign in</button>
      </div>
    </form>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const togglePassword = document.getElementById('togglePassword');
      const password = document.getElementById('password');
      const eyeIcon = document.getElementById('eyeIcon');
      const eyeOffIcon = document.getElementById('eyeOffIcon');

      eyeOffIcon.style.display = 'none';

      togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        if (type === 'password') {
          eyeIcon.style.display = 'inline';
          eyeOffIcon.style.display = 'none';
        } else {
          eyeIcon.style.display = 'none';
          eyeOffIcon.style.display = 'inline';
        }
      });
    });
  </script>
</body>

</html>
