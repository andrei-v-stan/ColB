document.addEventListener('touchstart', e => {
    e.preventDefault();

    // Handle 1 finger gestures
    if (e.targetTouches.length === 1) {
        const isCategoryButton = e.targetTouches[0].target.matches('.btn-cat');
        const isSubcategoryButton = e.targetTouches[0].target.matches('.btn-subcat');
        const isItemButton = e.targetTouches[0].target.matches('.btn-item');
        const isShareButton = e.targetTouches[0].target.matches('.btn-share');
        const isAddButton = e.targetTouches[0].target.matches('.btn-add--plus > .content');
        const isAddWrapper = e.targetTouches[0].target.matches('.add-element-wrapper');
        const isAddCategoryButton = e.targetTouches[0].target.matches('#add-cat > .content');
        const isAddSubcategoryButton = e.targetTouches[0].target.matches('#add-subcat > .content');
        const isAddItemButton = e.targetTouches[0].target.matches('#add-item > .content');

        
        // If we press with 1 finger we collapse/expand elements (category/subcategory)
        if (isCategoryButton) {
            const categoryButton = e.targetTouches[0].target;
            const category = categoryButton.closest('.category');
            
            if (!category.classList.contains('active')) {
                activateElement(category);
            } else {
                deactivateElement(category);  
            }
        }

        if (isSubcategoryButton) {
            const subcategoryButton = e.targetTouches[0].target;
            const subcategory = subcategoryButton.closest('.subcategory');
            
            if (!subcategory.classList.contains('active')) {
                activateElement(subcategory);
            } else {
                deactivateElement(subcategory);
            }
        }

        if (isItemButton) {
            const itemButton = e.targetTouches[0].target;
            
            if (!itemButton.classList.contains('selected')) {
                selectElement(itemButton);
            } else {
                deselectElement(itemButton);
            }
        }

        if (isShareButton) {
            const selectedItems = document.querySelectorAll('.btn-item.selected');
            selectedItems.forEach(console.log);
    
            //TODO: Generate share link for all selected items
        }
    
        if (isAddButton) {
            const form = document.querySelector('.add-element-wrapper');
            form.classList.add('active');
            const selectElement = document.querySelector('.select-element');
            selectElement.classList.add('active');
        }
    
        if (isAddCategoryButton) {
            const selectElement = e.targetTouches[0].target.closest('.select-element');
            deactivateElement(selectElement);
    
            const addCategoryForm = document.querySelector('.add-cat-form');
            activateElement(addCategoryForm);
        }
    
        if (isAddSubcategoryButton) {
            const selectElement = e.targetTouches[0].target.closest('.select-element');
            deactivateElement(selectElement);
    
            const addSubcategoryForm = document.querySelector('.add-subcat-form');
            activateElement(addSubcategoryForm);
        }
    
        if (isAddItemButton) {
            const selectElement = e.targetTouches[0].target.closest('.select-element');
            deactivateElement(selectElement);
    
            const addItemForm = document.querySelector('.add-item-form');
            activateElement(addItemForm);
        }
    
        if (isAddWrapper) {
            const addCategoryForm = document.querySelector('.add-cat-form');
            const addSubcategoryForm = document.querySelector('.add-subcat-form');
            const addItemForm = document.querySelector('.add-item-form');
    
            deactivateElement(addCategoryForm);
            deactivateElement(addSubcategoryForm);
            deactivateElement(addItemForm);
            deactivateElement(e.targetTouches[0].target);
        }
    }

    // Handle 2 finger gestures
    if (e.targetTouches.length === 2) {
        const isCategoryButton = e.targetTouches[0].target.matches('.btn-cat');
        const isCategoryButton2 = e.targetTouches[1].target.matches('.btn-cat');
        const isSubcategoryButton = e.targetTouches[0].target.matches('.btn-subcat');
        const isSubcategoryButton2 = e.targetTouches[0].target.matches('.btn-subcat');
        const isItemButton = e.targetTouches[0].target.matches('.btn-item');
        const isItemButton2 = e.targetTouches[0].target.matches('.btn-item');
        
        // If we press with 2 fingers we select all elements (subcategory/items)
        if (isCategoryButton && isCategoryButton2) {
            const categoryButton = e.targetTouches[0].target;
            
            if (!categoryButton.classList.contains('selected')) {
                // select category
                selectElement(categoryButton);

                // select all subcategories
                const category = categoryButton.closest('.category');
                const subcategories = category.querySelectorAll(".btn-subcat");
                subcategories.forEach(selectElement);
                // select all items
                const items = category.querySelectorAll(".btn-item");
                items.forEach(selectElement);
            } else {
                // deselect category
                deselectElement(categoryButton);

                // deselect all subcategories
                const category = categoryButton.closest('.category');
                const subcategories = category.querySelectorAll(".btn-subcat");
                subcategories.forEach(deselectElement);
                // deselect all items
                const items = category.querySelectorAll(".btn-item");
                items.forEach(deselectElement);
            }
        }

        if (isSubcategoryButton && isSubcategoryButton2) {
            const subcategoryButton = e.targetTouches[0].target;

            if (!subcategoryButton.classList.contains('selected')) {
                // select subcategory
                selectElement(subcategoryButton);

                // select all items
                const subcategory = subcategoryButton.closest('.subcategory');
                const items = subcategory.querySelectorAll(".btn-item");
                items.forEach(selectElement);
            } else {
                // deselect subcategory
                deselectElement(subcategoryButton);

                // deselect all items
                const subcategory = subcategoryButton.closest('.subcategory');
                const items = subcategory.querySelectorAll(".btn-item");
                items.forEach(deselectElement);
            }
        }

        if (isItemButton && isItemButton2) {
            const itemButton = e.targetTouches[0].target;
        
        if (!itemButton.classList.contains('selected')) {
            // select item
            selectElement(itemButton);
        } else {
            // deselect item
            deselectElement(itemButton);
        }
        }
    }
    
}, {passive: false});

function selectElement(element) {
    if (!element.classList.contains('selected')) {
        element.classList.add('selected');
    }
}

function deselectElement(element) {
    if (element.classList.contains('selected')) {
        element.classList.remove('selected');
    }
}

function activateElement(element) {
    if (!element.classList.contains('active')) {
        element.classList.add('active');
    }
}

function deactivateElement(element) {
    if (element.classList.contains('active')) {
        element.classList.remove('active');
    }
}