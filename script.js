const images = document.querySelectorAll('.gallery-image');

const overlay = document.createElement('div');
overlay.style.position = 'fixed';
overlay.style.top = '0';
overlay.style.left = '0';
overlay.style.width = '100%';
overlay.style.height = '100%';
overlay.style.background = 'rgba(0,0,0,0.9)';
overlay.style.display = 'none';
overlay.style.justifyContent = 'center';
overlay.style.alignItems = 'center';
overlay.style.zIndex = '9999';

const enlargedImage = document.createElement('img');
enlargedImage.style.maxWidth = '90%';
enlargedImage.style.maxHeight = '90%';
enlargedImage.style.objectFit = 'contain';

overlay.appendChild(enlargedImage);
document.body.appendChild(overlay);

images.forEach(image => {
    image.addEventListener('click', () => {
        enlargedImage.src = image.src;
        enlargedImage.alt = image.alt;
        overlay.style.display = 'flex';
    });
});

overlay.addEventListener('click', () => {
    overlay.style.display = 'none';
});
