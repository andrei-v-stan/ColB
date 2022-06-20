
document.addEventListener('click', e => {
    const isCategoryButton = e.target.matches('.btn-cat');
    const isSubcategoryButton = e.target.matches('.btn-subcat');
    const isItemButton = e.target.matches('.btn-item');
    const isShareButton = e.target.matches('.btn-share');
    const isAddButton = e.target.matches('.btn-add--plus > .content');
    const isAddWrapper = e.target.matches('.add-element-wrapper');
    const isAddCategoryButton = e.target.matches('#add-cat > .content');
    const isAddSubcategoryButton = e.target.matches('#add-subcat > .content');
    const isAddItemButton = e.target.matches('#add-item > .content');

    console.log(e.target);

    if (isCategoryButton) {
        const categoryButton = e.target;
        
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

    if (isSubcategoryButton) {
        const subcategoryButton = e.target;

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

    if (isItemButton) {
        const itemButton = e.target;
        
        if (!itemButton.classList.contains('selected')) {
            // select item
            selectElement(itemButton);
        } else {
            // deselect item
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
        const selectElement = e.target.closest('.select-element');
        deactivateElement(selectElement);

        const addCategoryForm = document.querySelector('.add-cat-form');
        activateElement(addCategoryForm);
    }

    if (isAddSubcategoryButton) {
        const selectElement = e.target.closest('.select-element');
        deactivateElement(selectElement);

        const addSubcategoryForm = document.querySelector('.add-subcat-form');
        activateElement(addSubcategoryForm);
    }

    if (isAddItemButton) {
        const selectElement = e.target.closest('.select-element');
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
        deactivateElement(e.target);
    }
});

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