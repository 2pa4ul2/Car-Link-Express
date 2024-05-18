const tabs = document.querySelectorAll('.tab-btn');
const containers = document.querySelectorAll('.container');

tabs.forEach((tab, index) => {
    tab.addEventListener('click', () => {
        tabs.forEach(tab => tab.classList.remove('active'));
        tab.classList.add('active');

        // Adjust the logic as per your requirements
    });
});

const secondaryTabs = document.querySelectorAll('.tab-btn-secondary');
const secondaryContents = document.querySelectorAll('.content'); // Adjust if these have different content containers

secondaryTabs.forEach((tab, index) => {
    tab.addEventListener('click', () => {
        secondaryTabs.forEach(tab => tab.classList.remove('active'));
        tab.classList.add('active');

        var line = document.querySelector('.line');
        line.style.width = tab.offsetWidth + 'px';
        line.style.left = tab.offsetLeft + 'px';

        // Hide all secondary contents
        secondaryContents.forEach(content => content.style.display = 'none');
        // Show the corresponding secondary content
        secondaryContents[index].style.display = 'block';
    });
});
