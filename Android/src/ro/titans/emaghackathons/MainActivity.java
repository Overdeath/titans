package ro.titans.emaghackathons;

import java.util.ArrayList;

import android.os.Bundle;
import android.app.Activity;
import android.view.Menu;
import android.speech.RecognizerIntent;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;
import android.content.Intent;

public class MainActivity extends Activity {
	private String[] availableVoiceCommands = new String[20];
	public static final String EMAG_URL = "http://m.emag.ro/search/";
	public static final String APP_IP = "172.31.12.38";
	public static final String APP_URL = "http://"+APP_IP+"/add_command.php?code=";
	
	protected static final int REQUEST_OK = 1;
	private WebView mWebView;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		mWebView = (WebView) findViewById(R.id.activity_main_webview);
		WebSettings webSettings = mWebView.getSettings();
		webSettings.setJavaScriptEnabled(true);
		mWebView.loadUrl("http://"+APP_IP);
		mWebView.setWebViewClient(new WebViewClient());
		
		//initiate voice commands
		availableVoiceCommands[0] = "vreau cafea";
		availableVoiceCommands[1] = "alarma";
		availableVoiceCommands[2] = "alarmă";
		availableVoiceCommands[3] = "alarme";
		availableVoiceCommands[4] = "black friday";
		availableVoiceCommands[5] = "sms";
		availableVoiceCommands[6] = "semese";
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu items for use in the action bar
	    MenuInflater inflater = getMenuInflater();
	    inflater.inflate(R.menu.main_activity_actions, menu);
	    return super.onCreateOptionsMenu(menu);
	}
	
	@Override
	protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        String descrption = "Execut comanda";
        if (requestCode==REQUEST_OK  && resultCode==RESULT_OK) {
    		ArrayList<String> thingsYouSaid = data.getStringArrayListExtra(RecognizerIntent.EXTRA_RESULTS);
    		String voiceCommand = thingsYouSaid.get(0).toString();
    		String url = APP_URL;
    		for (int i=0; i<availableVoiceCommands.length; i++) {
    			if (voiceCommand.toLowerCase().contains("emag")) {
    				url = EMAG_URL;
    				voiceCommand = voiceCommand.replace("emag ", "");
    				descrption = "Caut pe emag ";
    			}
    		}
    		Toast.makeText(this, descrption+" "+voiceCommand, Toast.LENGTH_LONG).show();
    		url = url + voiceCommand;
    		mWebView.loadUrl(url);
        }
    }
	
	@Override
    // Detect when the back button is pressed
    public void onBackPressed() {
        if(mWebView.canGoBack()) {
            mWebView.goBack();
        } else {
            // Let the system handle the back button
            super.onBackPressed();
        }
    }
	
	private void processVoiceCommand() {
		Intent i = new Intent(RecognizerIntent.ACTION_RECOGNIZE_SPEECH);
		String languagePref = "ro";
		i.putExtra(RecognizerIntent.EXTRA_LANGUAGE, languagePref);
		i.putExtra(RecognizerIntent.EXTRA_LANGUAGE_PREFERENCE, languagePref); 
		i.putExtra(RecognizerIntent.EXTRA_ONLY_RETURN_LANGUAGE_PREFERENCE, languagePref);
    	try {
    		startActivityForResult(i, REQUEST_OK);
        } catch (Exception e) {
         	Toast.makeText(this, "Error initializing speech to text engine.", Toast.LENGTH_LONG).show();
        }
	}
	
	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
	    // Handle presses on the action bar items
	    switch (item.getItemId()) {
	        case R.id.action_voice_search:
	            processVoiceCommand();
	            return true;
	        case R.id.action_settings:
	        	Toast.makeText(this, "Coming soon.", Toast.LENGTH_LONG).show();
	            return true;
	        default:
	            return super.onOptionsItemSelected(item);
	    }
	}

}
