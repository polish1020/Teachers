class BrowserCore {
	private String Url;
	private Object Html;
	private web = new Web();
	private render = new Render();
	public void getPage(String Url) {
		Url = getUrlFromInput();
		Html = web.getPageHtmlFromServer(Url);
		render.render(Html);
	}
}

class Web {
	public Object getPageHtmlFromServer(String Url){
		return get(Url);
	}
	private Object get(String Url){}
}

class Render {
	private mmJSInterpreter = new JSInterpreter();
	public void render(String Html){
		render(Html);
		mJSInterpreter.doSomething();
	}
}

class JSInterpreter {
	public void doSomething(){}
}

class Browser {
	public void main() {
		Object mBrowserCore = new BrowserCore()
		mBrowserCore.getPage();
	}
}