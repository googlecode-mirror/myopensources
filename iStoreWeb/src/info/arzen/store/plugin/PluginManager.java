package info.arzen.store.plugin;

import java.util.HashMap;

import org.json.JSONArray;
import org.json.JSONException;

import android.content.Context;
import android.util.Log;

public class PluginManager {
	private HashMap<String, Plugin> plugins = new HashMap<String,Plugin>();
	protected Context ctx;

	/**
	 * Sets the context of the Plugin. This can then be used to do things like
	 * get file paths associated with the Activity.
	 * 
	 * @param ctx The context of the main Activity.
	 */
	public void setContext(Context ctx) {
		this.ctx = ctx;
	}
	
	
    /**
     * Add plugin to be loaded and cached.  This creates an instance of the plugin.
     * If plugin is already created, then just return it.
     * 
     * @param className				The class to load
     * @return						The plugin
     */
	public Plugin addPlugin(String className) {
	    try {
            return this.addPlugin(className, this.getClassByName(className)); 
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
            System.out.println("Error adding plugin "+className+".");
        }
        return null;
	}
	
    /**
     * Add plugin to be loaded and cached.  This creates an instance of the plugin.
     * If plugin is already created, then just return it.
     * 
     * @param className				The class to load
     * @param clazz					The class object (must be a class object of the className)
     * @param callbackId			The callback id to use when calling back into JavaScript
     * @return						The plugin
     */
	@SuppressWarnings("unchecked")
	private Plugin addPlugin(String className, Class clazz) { 
    	if (this.plugins.containsKey(className)) {
    		return this.getPlugin(className);
    	}
    	try {
              Plugin plugin = (Plugin)clazz.newInstance();
              this.plugins.put(className, plugin);
              return plugin;
    	}
    	catch (Exception e) {
    		  e.printStackTrace();
    		  System.out.println("Error adding plugin "+className+".");
    	}
    	return null;
    }
    
    /**
     * Get the loaded plugin.
     * 
     * @param className				The class of the loaded plugin.
     * @return
     */
    private Plugin getPlugin(String className) {
    	Plugin plugin = this.plugins.get(className);
    	return plugin;
    }
    
	/**
	 * Get the class.
	 * 
	 * @param clazz
	 * @return
	 * @throws ClassNotFoundException
	 */
	@SuppressWarnings("unchecked")
	private Class getClassByName(final String clazz) throws ClassNotFoundException {
		return Class.forName(clazz);
	}


	public String exec(final String className, final String action, final String callbackId, final String jsonArgs, final boolean passContext) {
		try {
			final JSONArray args = new JSONArray(jsonArgs);
			Plugin plugin = getPlugin(className);
			if (passContext) {
				plugin.setContext(this.ctx);
			}
			return plugin.execute(action, args, callbackId);
		} catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return "";
	}

}
