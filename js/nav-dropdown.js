document.querySelectorAll('.nav-item > span').forEach(item => {
  item.addEventListener('click', e => {
    e.preventDefault();
    const dropdown = item.nextElementSibling;
    dropdown.classList.toggle('open');
  });
});
