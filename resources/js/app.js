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
		try { localStorage.setItem('soil-sense-dark', isDark ? '1' : '0'); } catch (e) {}
	};

	// initialize from storage or prefers-color-scheme
	const stored = (function(){ try { return localStorage.getItem('soil-sense-dark'); } catch(e){ return null }})();
	if (stored === '1') setTheme(true);
	else if (stored === '0') setTheme(false);
	else setTheme(window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches);

	toggle.addEventListener('click', () => {
		const isDark = document.documentElement.classList.toggle('dark-theme');
		setTheme(isDark);
	});
});
