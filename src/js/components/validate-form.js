import JustValidate from 'just-validate'

const validation = new JustValidate('#my-form', {
  errorFieldCssClass: 'is-invalid',
  errorLabelStyle: {
    color: '#F06666',
  },
})

validation
  .addField('#name', [
    {
        rule: 'minLength',
        value: 3,
        errorMessage: 'Имя минимум 3 символа!',
    },
    {
        rule: 'required',
        errorMessage: 'Введите имя!',
    },
  ])
  .addField('#mail', [
    {
        rule: 'required',
        errorMessage: 'Введите email!',
    },
    {
        rule: 'email',
        errorMessage: 'Адрес некорректен!',
    },
  ])


const validation2 = new JustValidate('#subscribe', {
  errorFieldCssClass: 'is-invalid',
  errorLabelStyle: {
    color: '#F06666',
  },
})

validation2
  .addField('#mail2', [
    {
        rule: 'required',
        errorMessage: 'Введите email!',
    },
    {
        rule: 'email',
        errorMessage: 'Адрес некорректен!',
    },
  ])