  function toggleFilter() {
            const content = document.getElementById('filter-content');
            const chevron = document.getElementById('filter-chevron');
            
            content.classList.toggle('active');
            chevron.classList.toggle('active');
        }        function updateFilterSubtitle() {
            const genderSelect = document.getElementById('gender-select');
            const priceSelect = document.getElementById('price-select');
            const locationSelect = document.getElementById('location-select');
            const subtitle = document.getElementById('filter-subtitle');
            const activeFilters = document.getElementById('active-filters');
            
            let activeCount = 0;
            let filterText = [];
            
            if (genderSelect.value) {
                activeCount++;
                filterText.push(genderSelect.options[genderSelect.selectedIndex].text);
            }
            
            if (priceSelect.value) {
                activeCount++;
                filterText.push(priceSelect.options[priceSelect.selectedIndex].text);
            }
            
            if (locationSelect && locationSelect.value) {
                activeCount++;
                filterText.push(locationSelect.options[locationSelect.selectedIndex].text);
            }
            
            if (activeCount > 0) {
                subtitle.textContent = `${activeCount} filter aktif: ${filterText.join(', ')}`;
                showActiveFilters();
            } else {
                subtitle.textContent = 'Pilih kriteria untuk menyaring hasil';
                activeFilters.style.display = 'none';
            }
        }        function showActiveFilters() {
            const activeFilters = document.getElementById('active-filters');
            const genderSelect = document.getElementById('gender-select');
            const priceSelect = document.getElementById('price-select');
            const locationSelect = document.getElementById('location-select');
            
            let filtersHTML = '';
            
            if (genderSelect.value) {
                filtersHTML += `
                    <span class="filter-tag">
                        Gender: ${genderSelect.options[genderSelect.selectedIndex].text}
                        <span class="filter-tag-remove" onclick="removeFilter('gender')">&times;</span>
                    </span>
                `;
            }
            
            if (priceSelect.value) {
                filtersHTML += `
                    <span class="filter-tag">
                        Harga: ${priceSelect.options[priceSelect.selectedIndex].text}
                        <span class="filter-tag-remove" onclick="removeFilter('price')">&times;</span>
                    </span>
                `;
            }
            
            if (locationSelect && locationSelect.value) {
                filtersHTML += `
                    <span class="filter-tag">
                        Lokasi: ${locationSelect.options[locationSelect.selectedIndex].text}
                        <span class="filter-tag-remove" onclick="removeFilter('location')">&times;</span>
                    </span>
                `;
            }
            
            if (filtersHTML) {
                filtersHTML += '<button class="clear-filters" onclick="clearAllFilters()">Hapus Semua</button>';
                activeFilters.innerHTML = filtersHTML;
                activeFilters.style.display = 'flex';
            }
        }        function removeFilter(type) {
            if (type === 'gender') {
                document.getElementById('gender-select').value = '';
            } else if (type === 'price') {
                document.getElementById('price-select').value = '';
            } else if (type === 'location') {
                const locationSelect = document.getElementById('location-select');
                if (locationSelect) {
                    locationSelect.value = '';
                }
            }
            updateFilterSubtitle();
        }

        function clearAllFilters() {
            document.getElementById('gender-select').value = '';
            document.getElementById('price-select').value = '';
            const locationSelect = document.getElementById('location-select');
            if (locationSelect) {
                locationSelect.value = '';
            }
            updateFilterSubtitle();
        }        // Add event listeners
        document.getElementById('gender-select').addEventListener('change', updateFilterSubtitle);
        document.getElementById('price-select').addEventListener('change', updateFilterSubtitle);
        
        const locationSelect = document.getElementById('location-select');
        if (locationSelect) {
            locationSelect.addEventListener('change', updateFilterSubtitle);
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Set selected values based on URL parameters (simulate Laravel behavior)
            const urlParams = new URLSearchParams(window.location.search);
            
            if (urlParams.get('gender')) {
                document.getElementById('gender-select').value = urlParams.get('gender');
            }
            
            if (urlParams.get('price_range')) {
                document.getElementById('price-select').value = urlParams.get('price_range');
            }
            
            if (urlParams.get('location_type') && locationSelect) {
                locationSelect.value = urlParams.get('location_type');
            }
            
            updateFilterSubtitle();
        });
    document.addEventListener('DOMContentLoaded', function () {
        const genderSelect = document.getElementById('gender-select');
        const priceSelect = document.getElementById('price-select');
        const locationSelect = document.getElementById('location-select');

        if (genderSelect) {
            new Choices(genderSelect, {
                searchEnabled: false,
                itemSelectText: '',
                shouldSort: false
            });
        }

        if (priceSelect) {
            new Choices(priceSelect, {
                searchEnabled: false,
                itemSelectText: '',
                shouldSort: false
            });
        }

        if (locationSelect) {
            new Choices(locationSelect, {
                searchEnabled: false,
                itemSelectText: '',
                shouldSort: false
            });
        }
    });

    


    const urlParams = new URLSearchParams(window.location.search);
const scrollTarget = urlParams.get('scroll');
if(scrollTarget) {
    const element = document.getElementById(scrollTarget);
    if(element) {
        // Scroll instan tanpa smooth, dan jalankan sebelum DOMContentLoaded jika bisa
        element.scrollIntoView();
    }
}

