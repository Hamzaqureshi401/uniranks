function  addPickerToElement(el,min_date = "today"){
    return flatpickr(el,{
        enableTime: true,
        allowInput: true,
        minDate: min_date,
    });
}
