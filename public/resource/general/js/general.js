function messageManagement(code)
{	
	if(code.code <= 206)
	{
		alertify.success(code.message, code.time);
	}
	else if(code.code >= 300 && code.code <= 305)
	{
        alertify.warning(code.message, code.time);
	}
    else if(code.code >= 400 && code.code <= 415)
	{
        alertify.error(code.message, code.time);
	}
    else if(code.code >= 500 && code.code <= 515)
    {
        alertify.notify(code.message, code.time);
    }
}
