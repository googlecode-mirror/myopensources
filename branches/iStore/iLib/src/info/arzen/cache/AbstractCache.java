package info.arzen.cache;

public abstract class AbstractCache implements IterfaceCache {
	protected static final String TAG="AbstractCache";
    protected long expirationInMinutes;

    public AbstractCache(long expire) {
    	this.expirationInMinutes = expire;
	}
}
