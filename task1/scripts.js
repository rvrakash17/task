const data = [
    { name: 'John Doe', age: 25, country: 'USA' },
    { name: 'Anna Smith', age: 30, country: 'UK' },
    { name: 'Peter Johnson', age: 45, country: 'Canada' },
    { name: 'Linda Taylor', age: 28, country: 'Australia' },
    { name: 'David Brown', age: 35, country: 'USA' },
    { name: 'Susan Wilson', age: 32, country: 'UK' },
    { name: 'Michael Davis', age: 40, country: 'Canada' },
    { name: 'Sarah Miller', age: 27, country: 'Australia' }
];

function sortTable(columnIndex) {
    const table = document.getElementById('myTable');
    const tbody = table.tBodies[0];
    const rows = Array.from(tbody.rows);
    const isAscending = table.isAscending = !table.isAscending;

    rows.sort((row1, row2) => {
        const cell1 = row1.cells[columnIndex].textContent.trim();
        const cell2 = row2.cells[columnIndex].textContent.trim();

        if (!isNaN(cell1) && !isNaN(cell2)) {
            return isAscending ? cell1 - cell2 : cell2 - cell1;
        }

        return isAscending ? cell1.localeCompare(cell2) : cell2.localeCompare(cell1);
    });

    rows.forEach(row => tbody.appendChild(row));
}

let currentPage = 1;
const rowsPerPage = 3;

function displayTablePage(page) {
    const tbody = document.querySelector('#myTable tbody');
    tbody.innerHTML = '';

    const start = (page - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    const rows = data.slice(start, end);

    rows.forEach(row => {
        const tr = document.createElement('tr');
        tr.innerHTML = `<td>${row.name}</td><td>${row.age}</td><td>${row.country}</td>`;
        tbody.appendChild(tr);
    });

    document.getElementById('pageNumber').textContent = `Page ${page}`;
}

function nextPage() {
    if (currentPage * rowsPerPage < data.length) {
        currentPage++;
        displayTablePage(currentPage);
    }
}

function prevPage() {
    if (currentPage > 1) {
        currentPage--;
        displayTablePage(currentPage);
    }
}

displayTablePage(currentPage);


let currentSlide = 0;
const slides = document.querySelector('.slides');
const totalSlides = document.querySelectorAll('.slide').length;

function updateSlidePosition() {
    slides.style.transform = `translateX(-${currentSlide * 100}%)`;
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    updateSlidePosition();
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    updateSlidePosition();
}
