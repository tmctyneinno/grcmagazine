<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

class Header extends Component
{
    public $slides;
    public $currentSlide = 0;

    public $currentRoute;
    public $isDarkMode = false;
    public $isMobileMenuOpen = false;
    public $activeDropdown = null;
    
   
    protected $listeners = [
        'toggleDarkMode' => 'toggleDarkMode',
        'closeMobileMenu' => 'closeMobileMenu',
        'navigationUpdated' => '$refresh',
    ];

    public function mount()
    {
        $this->currentRoute = Route::currentRouteName() ?? 'home';
        $this->isDarkMode = session('dark_mode', false);
        $this->slides = Article::where('is_published', true)
                              ->whereNotNull('image_path')
                              ->latest('published_at')
                              ->take(3)
                              ->get();
    }

    public function next()
    {
        $this->currentSlide = ($this->currentSlide + 1) % $this->slides->count();
    }

    public function prev()
    {
        $this->currentSlide = ($this->currentSlide - 1 + $this->slides->count()) % $this->slides->count();
    }

    public function toggleDarkMode()
    {
        $this->isDarkMode = !$this->isDarkMode;
        session(['dark_mode' => $this->isDarkMode]);
        $this->dispatch('darkModeToggled', $this->isDarkMode);
    }

    public function toggleMobileMenu()
    {
        $this->isMobileMenuOpen = !$this->isMobileMenuOpen;
    }

    public function closeMobileMenu()
    {
        $this->isMobileMenuOpen = false;
    }

    public function toggleDropdown($menuKey)
    {
        if ($this->activeDropdown === $menuKey) {
            $this->activeDropdown = null;
        } else {
            $this->activeDropdown = $menuKey;
        }
    }

    // Helper methods for the view
    public function isActiveRoute($route)
    {
        return $this->currentRoute === $route;
    }

    public function isChildActive($children)
    {
        foreach ($children as $child) {
            if ($this->currentRoute === $child['route']) {
                return true;
            }
        }
        return false;
    }

    public function getRoute($route)
    {
        return route($route);
    }

    public function render()
    {
        return view('livewire.header', [
            'slides' => $this->slides,
            'currentRoute' => $this->currentRoute,
            'isDarkMode' => $this->isDarkMode,
            'isMobileMenuOpen' => $this->isMobileMenuOpen,
            'activeDropdown' => $this->activeDropdown,
        ]);
    }
}