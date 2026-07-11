/* =========================================================
   SEARCH.JS
   Purpose: Handles course and content search interactions.
   This file is intentionally simple for beginner-friendly setup.
========================================================= */

document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.querySelector('[data-search-input]');
  const searchButton = document.querySelector('[data-search-button]');

  if (!searchInput || !searchButton) return;

  const runSearch = () => {
    const query = searchInput.value.trim();

    if (!query) {
      searchInput.classList.add('is-invalid');
      searchInput.focus();
      return;
    }

    searchInput.classList.remove('is-invalid');

    const advancedSearchForm = document.getElementById('advancedSearchForm');
    const heroSearchForm = document.getElementById('heroSearchForm');
    const searchTarget = advancedSearchForm || heroSearchForm;

    if (searchTarget) {
      const keywordInput = searchTarget.querySelector('#searchKeyword, [name="search_courses_instructors_or_skills"], [name="search_keyword"]');
      if (keywordInput) {
        keywordInput.value = query;
      }

      if (typeof searchTarget.requestSubmit === 'function') {
        searchTarget.requestSubmit();
      } else {
        searchTarget.dispatchEvent(new Event('submit', { bubbles: true, cancelable: true }));
      }
      return;
    }

    window.location.href = `courses.html?search=${encodeURIComponent(query)}`;
  };

  searchButton.addEventListener('click', () => {
    runSearch();
  });

  searchInput.addEventListener('keydown', (event) => {
    if (event.key === 'Enter') {
      event.preventDefault();
      runSearch();
    }
  });
});
