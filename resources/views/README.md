# BookBus - HTML Tailwind Templates

Modern, responsive HTML templates using Tailwind CSS CDN for the BookBus bus reservation system.

## 📦 What's Included

```
html-templates/
├── index.html              # Landing page with hero & search
├── trips.html              # Trip search/listing page
├── trip-details.html       # Trip details page (to create)
├── auth/
│   ├── login.html         # Login page
│   └── register.html      # Registration page
├── customer/
│   ├── dashboard.html     # Customer bookings (to create)
│   └── profile.html       # Profile management (to create)
└── admin/
    ├── dashboard.html     # Admin dashboard (to create)
    ├── buses.html         # Bus management (to create)
    ├── trips.html         # Trip management (to create)
    └── users.html         # User management (to create)
```

## 🎨 Design Features

### Typography
- **Display Font**: Darker Grotesque (900 weight for headings)
- **Body Font**: DM Sans (clean, readable)

### Color Palette
```
Primary:   #0F172A (Slate 900)
Secondary: #FF6B35 (Vibrant Orange)
Accent:    #00D9FF (Bright Cyan)
```

### Key Features
- ✅ Fully responsive (mobile-first)
- ✅ Tailwind CSS CDN (no build required)
- ✅ Modern animations & transitions
- ✅ Gradient backgrounds
- ✅ Card-based layouts
- ✅ Accessible form inputs
- ✅ Sticky navigation
- ✅ Clean, professional design

## 🚀 Quick Start

1. **No installation needed!** Just open any HTML file in your browser
2. **Internet connection required** for Tailwind CDN and Google Fonts
3. **Customize** by editing the `tailwind.config` in each file

## 📄 Pages

### ✅ Completed

1. **index.html** - Landing Page
   - Hero section with search form
   - Features section (3 cards)
   - Popular routes
   - CTA section
   - Footer

2. **auth/login.html** - Login Page
   - Email & password fields
   - Remember me checkbox
   - Social login buttons (Google, Facebook)
   - Forgot password link
   - Animated background

3. **auth/register.html** - Registration Page
   - Full name, email, phone, password fields
   - Password confirmation
   - Terms & conditions checkbox
   - Animated background

4. **trips.html** - Search/List Trips
   - Search form (sticky)
   - Trip cards with route visualization
   - Departure/arrival times
   - Price display
   - Available seats
   - Pagination

### 🔨 To Be Created

5. **trip-details.html** - Trip Details
   - Full trip information
   - Bus details
   - Amenities list
   - Booking sidebar
   - Seat selection

6. **customer/dashboard.html** - Customer Dashboard
   - My bookings list
   - Filter by status
   - Download tickets
   - Cancel reservations

7. **customer/profile.html** - Profile Management
   - Edit personal info
   - Change password
   - Email preferences

8. **admin/dashboard.html** - Admin Dashboard
   - Statistics cards
   - Recent bookings
   - Revenue charts
   - Quick actions

9. **admin/buses.html** - Bus Management
   - List all buses
   - Add/edit/delete buses
   - Status management

10. **admin/trips.html** - Trip Management
    - List all trips
    - Create/edit/delete trips
    - Assign buses

11. **admin/users.html** - User Management
    - List all users
    - Role management
    - User details

## 🎯 Tailwind Configuration

Each HTML file includes this configuration:

```javascript
tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: '#0F172A',
                secondary: '#FF6B35',
                accent: '#00D9FF',
            },
            fontFamily: {
                display: ['Darker Grotesque', 'sans-serif'],
                body: ['DM Sans', 'sans-serif'],
            }
        }
    }
}
```

## 🛠️ Customization

### Change Colors

Edit the `tailwind.config` section:
```javascript
colors: {
    primary: '#YOUR_COLOR',
    secondary: '#YOUR_COLOR',
    accent: '#YOUR_COLOR',
}
```

### Change Fonts

1. Update Google Fonts link in `<head>`
2. Update `tailwind.config` font families

### Add Components

Use Tailwind utility classes:
```html
<div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all">
    <!-- Your content -->
</div>
```

## 📱 Responsive Design

All templates use Tailwind's responsive prefixes:

- `sm:` - 640px and up
- `md:` - 768px and up
- `lg:` - 1024px and up
- `xl:` - 1280px and up

Example:
```html
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <!-- Responsive grid -->
</div>
```

## 🎨 Components Used

### Buttons
```html
<!-- Primary -->
<button class="px-6 py-3 bg-secondary text-white font-bold rounded-lg hover:bg-orange-600 transition-all">
    Button
</button>

<!-- Secondary -->
<button class="px-6 py-3 border-2 border-primary text-primary font-semibold rounded-lg hover:bg-primary hover:text-white transition-all">
    Button
</button>
```

### Cards
```html
<div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all hover:-translate-y-2">
    <!-- Card content -->
</div>
```

### Form Inputs
```html
<input type="text" 
    class="w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-secondary focus:ring-4 focus:ring-secondary/10 outline-none transition-all"
    placeholder="Enter text...">
```

## 🔗 Links Between Pages

Update these paths based on your structure:

```html
<!-- From root to auth -->
<a href="auth/login.html">Login</a>

<!-- From auth to root -->
<a href="../index.html">Home</a>

<!-- From auth to customer -->
<a href="../customer/dashboard.html">Dashboard</a>
```

## 🎭 Animations

### Fade In Up
```css
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fadeInUp {
    animation: fadeInUp 0.6s ease forwards;
}
```

### Slide Up (Auth Pages)
```css
@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
```

## 📊 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## 💡 Tips

1. **CDN vs Build**: These templates use Tailwind CDN for simplicity. For production, consider using the build process.

2. **Performance**: CDN is slower than compiled CSS. For production, build your CSS:
   ```bash
   npm install -D tailwindcss
   npx tailwindcss -i input.css -o output.css
   ```

3. **Icons**: Currently using SVG icons inline. Consider using a library like Heroicons.

4. **Forms**: Add JavaScript for client-side validation and form handling.

5. **Modals**: Add modal/dialog components as needed with Alpine.js or vanilla JS.

## 🔄 Converting to Laravel Blade

To convert these to Laravel Blade:

1. Rename `.html` to `.blade.php`
2. Replace static links with Laravel routes:
   ```html
   <!-- Before -->
   <a href="auth/login.html">Login</a>
   
   <!-- After -->
   <a href="{{ route('login') }}">Login</a>
   ```
3. Add CSRF tokens to forms:
   ```html
   @csrf
   ```
4. Use Blade directives:
   ```html
   @foreach($trips as $trip)
       <!-- Trip card -->
   @endforeach
   ```

## 📝 License

This template is part of the BookBus project.

## 👨‍💻 Author

Med Yassine BAHAJOU

---

**Note**: These are static HTML templates. You'll need to integrate them with your backend (Laravel, Node.js, etc.) for full functionality.
