window.addEventListener('load', () => {
  var hamburger = document.querySelector('.hamburger');
  var navigation = document.querySelector('nav'); 
  hamburger.addEventListener('click', (e) => {
      hamburger.style.display = 'none';
      navigation.style.top = 0;
      navigation.style.display = 'block';
  });
});


