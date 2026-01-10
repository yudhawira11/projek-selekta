import './bootstrap';

// Theme toggle: toggles `dark-theme` on <html> and persists choice to localStorage
document.addEventListener('DOMContentLoaded', () => {
	const toggle = document.getElementById('themeToggle');
	if (!toggle) return;

	const setTheme = (isDark) => {
		const root = document.documentElement;
		if (isDark) {
			root.classList.add('dark-theme');
			toggle.setAttribute('aria-pressed', 'true');
		} else {
			root.classList.remove('dark-theme');
			toggle.setAttribute('aria-pressed', 'false');
		}
		
		// Update knob position if it exists
		const knob = document.querySelector('.knob');
		if (knob) {
			knob.style.transform = isDark ? 'translateX(20px)' : 'translateX(0)';
		}
		
		// Update icon color if it exists
		const icon = document.getElementById('themeIcon');
		if (icon) {
			icon.style.stroke = isDark ? '#fff' : '#000';
			icon.style.fill = isDark ? '#fff' : '#000';
		}
		
		try { localStorage.setItem('soil-sense-theme', isDark ? 'dark' : 'light'); } catch (e) {}
	};

	// initialize from storage or prefers-color-scheme
	const stored = (function(){ try { return localStorage.getItem('soil-sense-theme'); } catch(e){ return null }})();
	if (stored === 'dark') setTheme(true);
	else if (stored === 'light') setTheme(false);
	else setTheme(window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches);

	toggle.addEventListener('click', () => {
		const isDark = document.documentElement.classList.toggle('dark-theme');
		setTheme(isDark);
	});
});
